<?php

namespace App\Http\Controllers;

use App\Models\InteriorDetail;
use App\Models\Project;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InteriorDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interiorDetails = InteriorDetail::latest()->get();
        return view('admin.interior-detail.index', compact('interiorDetails'));
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
        return view('admin.interior-detail.create', compact('projects', 'workers'));
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
        $pdfFile->move(public_path('interior-detail-file'), $pdfName);

        $interiorDetail = new InteriorDetail();
        $interiorDetail->project_id = $request->project_id;
        $interiorDetail->worker_id = $request->worker_id;
        $interiorDetail->task_title = $request->task_title;
        $interiorDetail->slug = Str::slug($request->task_title);
        $interiorDetail->task_description = $request->task_description;
        $interiorDetail->task_progress = $request->task_progress;
        $interiorDetail->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $interiorDetail->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        $interiorDetail->file = $pdfName;
        if (isset($request->status)) {
            $interiorDetail->status = true;
        } else {
            $interiorDetail->status = false;
        }
        $interiorDetail->save();
        return redirect()->route('interior-detail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InteriorDetail  $interiorDetail
     * @return \Illuminate\Http\Response
     */
    public function show(InteriorDetail $interiorDetail)
    {
        return view('admin.interior-detail.show', compact('interiorDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InteriorDetail  $interiorDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(InteriorDetail $interiorDetail)
    {
        $projects = Project::latest()->get();
        $workers = Worker::latest()->get();
        return view('admin.interior-detail.edit', compact('interiorDetail', 'projects', 'workers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InteriorDetail  $interiorDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InteriorDetail $interiorDetail)
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
            $oldFile = public_path(). "/interior-detail-file/". $interiorDetail->file;
            if (file_exists($oldFile))
            {
                unlink($oldFile);
            }
            $pdfName = time() . '.' . $pdfFile->extension();
            $pdfFile->move(public_path('interior-detail-file'), $pdfName);
            $interiorDetail->file = $pdfName;
        }

        $interiorDetail->project_id = $request->project_id;
        $interiorDetail->worker_id = $request->worker_id;
        $interiorDetail->task_title = $request->task_title;
        $interiorDetail->slug = Str::slug($request->task_title);
        $interiorDetail->task_description = $request->task_description;
        $interiorDetail->task_progress = $request->task_progress;
        $interiorDetail->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $interiorDetail->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        if (isset($request->status)) {
            $interiorDetail->status = true;
        } else {
            $interiorDetail->status = false;
        }
        $interiorDetail->update();
        return redirect()->route('interior-detail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InteriorDetail  $interiorDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(InteriorDetail $interiorDetail)
    {
        //
    }
}
