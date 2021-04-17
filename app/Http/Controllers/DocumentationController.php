<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use App\Models\Project;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentations = Documentation::latest()->get();
        return view('admin.documentation.index', compact('documentations'));
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
        return view('admin.documentation.create', compact('projects', 'workers'));
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
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('documentations'), $imageName);

        $documentation = new Documentation();
        $documentation->project_id = $request->project_id;
        $documentation->worker_id = $request->worker_id;
        $documentation->task_title = $request->task_title;
        $documentation->slug = Str::slug($request->task_title);
        $documentation->task_description = $request->task_description;
        $documentation->task_progress = $request->task_progress;
        $documentation->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $documentation->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        $documentation->file = $imageName;
        if (isset($request->status)) {
            $documentation->status = true;
        } else {
            $documentation->status = false;
        }
        $documentation->save();
        return redirect()->route('documentation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Documentation  $documentation
     * @return \Illuminate\Http\Response
     */
    public function show(Documentation $documentation)
    {
        return view('admin.documentation.show', compact('documentation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Documentation  $documentation
     * @return \Illuminate\Http\Response
     */
    public function edit(Documentation $documentation)
    {
        $projects = Project::latest()->get();
        $workers = Worker::latest()->get();
        return view('admin.documentation.edit', compact('projects','workers', 'documentation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Documentation  $documentation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documentation $documentation)
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
            $image->move(public_path('documentations'), $imageName);
            $documentation->file = $imageName;
        }

        $documentation->project_id = $request->project_id;
        $documentation->worker_id = $request->worker_id;
        $documentation->task_title = $request->task_title;
        $documentation->slug = Str::slug($request->task_title);
        $documentation->task_description = $request->task_description;
        $documentation->task_progress = $request->task_progress;
        $documentation->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $documentation->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        if (isset($request->status)) {
            $documentation->status = true;
        } else {
            $documentation->status = false;
        }
        $documentation->update();
        return redirect()->route('documentation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Documentation  $documentation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documentation $documentation)
    {
        //
    }
}
