<?php

namespace App\Http\Controllers;

use App\Models\Mobilization;
use App\Models\Project;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MobilizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobilizations = Mobilization::latest()->get();
        return view('admin.mobilization.index', compact('mobilizations'));
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
        return view('admin.mobilization.create', compact('projects', 'workers'));
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
        $pdfFile->move(public_path('mobilization-file'), $pdfName);

        $mobilization = new Mobilization();
        $mobilization->project_id = $request->project_id;
        $mobilization->worker_id = $request->worker_id;
        $mobilization->task_title = $request->task_title;
        $mobilization->slug = Str::slug($request->task_title);
        $mobilization->task_description = $request->task_description;
        $mobilization->task_progress = $request->task_progress;
        $mobilization->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $mobilization->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        $mobilization->file = $pdfName;
        if (isset($request->status)) {
            $mobilization->status = true;
        } else {
            $mobilization->status = false;
        }
        $mobilization->save();
        return redirect()->route('mobilization.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mobilization  $mobilization
     * @return \Illuminate\Http\Response
     */
    public function show(Mobilization $mobilization)
    {
        return view('admin.mobilization.show', compact('mobilization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mobilization  $mobilization
     * @return \Illuminate\Http\Response
     */
    public function edit(Mobilization $mobilization)
    {
        $projects = Project::latest()->get();
        $workers = Worker::latest()->get();
        return view('admin.mobilization.edit', compact('projects','workers', 'mobilization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mobilization  $mobilization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mobilization $mobilization)
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
            $oldFile = public_path(). "/mobilization-file/". $mobilization->file;
            if (file_exists($oldFile))
            {
                unlink($oldFile);
            }
            $pdfName = time() . '.' . $pdfFile->extension();
            $pdfFile->move(public_path('mobilization-file'), $pdfName);
            $mobilization->file = $pdfName;
        }

        $mobilization->project_id = $request->project_id;
        $mobilization->worker_id = $request->worker_id;
        $mobilization->task_title = $request->task_title;
        $mobilization->slug = Str::slug($request->task_title);
        $mobilization->task_description = $request->task_description;
        $mobilization->task_progress = $request->task_progress;
        $mobilization->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $mobilization->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        if (isset($request->status)) {
            $mobilization->status = true;
        } else {
            $mobilization->status = false;
        }
        $mobilization->update();
        return redirect()->route('mobilization.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mobilization  $mobilization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mobilization $mobilization)
    {
        //
    }
}
