<?php

namespace App\Http\Controllers;

use App\Models\MEP;
use App\Models\Project;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MEPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mEPs = MEP::latest()->get();
        return view('admin.m-e-p.index', compact('mEPs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::latest()->get();
        $workers = Worker::latest()->get();
        return view('admin.m-e-p.create', compact('projects', 'workers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'task_title' => 'required',
            'task_description' => 'required',
            'project_id' => 'required',
            'worker_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $pdfFile = $request->file('file');
        $pdfName = time() . '.' . $pdfFile->extension();
        $pdfFile->move(public_path('m-e-p-file'), $pdfName);

        $mEP = new MEP();
        $mEP->project_id = $request->project_id;
        $mEP->worker_id = $request->worker_id;
        $mEP->task_title = $request->task_title;
        $mEP->slug = Str::slug($request->task_title);
        $mEP->task_description = $request->task_description;
        $mEP->task_progress = $request->task_progress;
        $mEP->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $mEP->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        $mEP->file = $pdfName;
        if (isset($request->status)) {
            $mEP->status = true;
        } else {
            $mEP->status = false;
        }
        $mEP->save();
        return redirect()->route('m-e-p.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MEP  $mEP
     * @return \Illuminate\Http\Response
     */
    public function show(MEP $mEP)
    {
        return view('admin.m-e-p.show', compact('mEP'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MEP  $mEP
     * @return \Illuminate\Http\Response
     */
    public function edit(MEP $mEP)
    {
        $projects = Project::latest()->get();
        $workers = Worker::latest()->get();
        return view('admin.m-e-p.edit', compact('mEP', 'projects', 'workers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MEP  $mEP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MEP $mEP)
    {
        $this->validate($request, [
            'task_title' => 'required',
            'task_description' => 'required',
            'project_id' => 'required',
            'worker_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if ($pdfFile = $request->file('file'))
        {
            $oldFile = public_path(). "/m-e-p-file/". $mEP->file;
            if (file_exists($oldFile))
            {
                unlink($oldFile);
            }
            $pdfName = time() . '.' . $pdfFile->extension();
            $pdfFile->move(public_path('m-e-p-file'), $pdfName);
            $mEP->file = $pdfName;
        }

        $mEP->project_id = $request->project_id;
        $mEP->worker_id = $request->worker_id;
        $mEP->task_title = $request->task_title;
        $mEP->slug = Str::slug($request->task_title);
        $mEP->task_description = $request->task_description;
        $mEP->task_progress = $request->task_progress;
        $mEP->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $mEP->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        if (isset($request->status)) {
            $mEP->status = true;
        } else {
            $mEP->status = false;
        }
        $mEP->update();
        return redirect()->route('m-e-p.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MEP  $mEP
     * @return \Illuminate\Http\Response
     */
    public function destroy(MEP $mEP)
    {
        //
    }
}
