<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SiteClearance;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiteClearanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siteClearances = SiteClearance::latest()->get();
        return view('admin.site-clearance.index', compact('siteClearances'));
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
        return view('admin.site-clearance.create', compact('projects', 'workers'));
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

        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('files'), $imageName);

        $siteClearance = new SiteClearance();
        $siteClearance->project_id = $request->project_id;
        $siteClearance->worker_id = $request->worker_id;
        $siteClearance->task_title = $request->task_title;
        $siteClearance->slug = Str::slug($request->task_title);
        $siteClearance->task_description = $request->task_description;
        $siteClearance->task_progress = $request->task_progress;
        $siteClearance->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $siteClearance->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        $siteClearance->file = $imageName;
        if (isset($request->status)) {
            $siteClearance->status = true;
        } else {
            $siteClearance->status = false;
        }
        $siteClearance->save();
        return redirect()->route('site-clearance.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SiteClearance  $siteClearance
     * @return \Illuminate\Http\Response
     */
    public function show(SiteClearance $siteClearance)
    {
        return view('admin.site-clearance.show', compact('siteClearance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteClearance  $siteClearance
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteClearance $siteClearance)
    {
        $projects = Project::latest()->get();
        $workers = Worker::latest()->get();
        return view('admin.site-clearance.edit', compact('projects','workers', 'siteClearance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiteClearance  $siteClearance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteClearance $siteClearance)
    {
        $this->validate($request, [
            'task_title' => 'required',
            'task_description' => 'required',
            'project_id' => 'required',
            'worker_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $image = $request->file('file');
        if($image){
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('files'), $imageName);
            $siteClearance->file = $imageName;
        }

        $siteClearance->project_id = $request->project_id;
        $siteClearance->worker_id = $request->worker_id;
        $siteClearance->task_title = $request->task_title;
        $siteClearance->slug = Str::slug($request->task_title);
        $siteClearance->task_description = $request->task_description;
        $siteClearance->task_progress = $request->task_progress;
        $siteClearance->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $siteClearance->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        if (isset($request->status)) {
            $siteClearance->status = true;
        } else {
            $siteClearance->status = false;
        }
        $siteClearance->update();
        return redirect()->route('site-clearance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteClearance  $siteClearance
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteClearance $siteClearance)
    {
        //
    }
}
