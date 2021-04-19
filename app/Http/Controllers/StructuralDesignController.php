<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\StructuralDesign;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StructuralDesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $structuralDesigns = StructuralDesign::latest()->get();
        return view('admin.structural-design.index', compact('structuralDesigns'));
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
        return view('admin.structural-design.create', compact('projects', 'workers'));
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
        $image->move(public_path('structural_design'), $imageName);

        $structuralDesign = new StructuralDesign();
        $structuralDesign->project_id = $request->project_id;
        $structuralDesign->worker_id = $request->worker_id;
        $structuralDesign->task_title = $request->task_title;
        $structuralDesign->slug = Str::slug($request->task_title);
        $structuralDesign->task_description = $request->task_description;
        $structuralDesign->task_progress = $request->task_progress;
        $structuralDesign->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $structuralDesign->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        $structuralDesign->file = $imageName;
        if (isset($request->status)) {
            $structuralDesign->status = true;
        } else {
            $structuralDesign->status = false;
        }
        $structuralDesign->save();
        return redirect()->route('structural-design.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StructuralDesign  $structuralDesign
     * @return \Illuminate\Http\Response
     */
    public function show(StructuralDesign $structuralDesign)
    {
        return view('admin.structural-design.show', compact('structuralDesign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StructuralDesign  $structuralDesign
     * @return \Illuminate\Http\Response
     */
    public function edit(StructuralDesign $structuralDesign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StructuralDesign  $structuralDesign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StructuralDesign $structuralDesign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StructuralDesign  $structuralDesign
     * @return \Illuminate\Http\Response
     */
    public function destroy(StructuralDesign $structuralDesign)
    {
        //
    }
}
