<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::latest()->get();
        return view ('admin.project.create', compact('projects'));
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
            'name' => 'required|unique:projects|max:255',
            'owner' => 'required',
            'amount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'location' => 'required',
            'description' => 'required'
        ]);
        $project = new Project();
        $project->name = $request->name;
        $project->slug = Str::slug($request-> name);
        $project->owner = $request->owner;
        $project->amount = $request->amount;
        $project->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $project->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        $project->location = $request->location;
        $project->description = $request->description;
        $project->save();
        return redirect()->route('project.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd();
        $this->validate(request(), [
            'name' => "required|unique:projects,name,{$id}",
            'owner' => 'required',
            'amount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'location' => 'required',
            'description' => 'required'
        ]);
        $project = Project::find($id);
        $project->name = $request->name;
        $project->slug = Str::slug($request->name);
        $project->owner = $request->owner;
        $project->amount = $request->amount;
        $project->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $project->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        $project->location = $request->location;
        $project->description = $request->description;
        $project->save();
        return redirect()->route('project.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back();
    }
}
