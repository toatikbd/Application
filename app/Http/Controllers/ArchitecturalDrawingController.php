<?php

namespace App\Http\Controllers;

use App\Models\ArchitecturalDrawing;
use App\Models\Project;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArchitecturalDrawingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $architecturalDrawings = ArchitecturalDrawing::latest()->get();
        return view('admin.architectural-drawing.index', compact('architecturalDrawings'));
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
        return view('admin.architectural-drawing.create', compact('projects', 'workers'));
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
        $pdfFile->move(public_path('architectural-drawing-file'), $pdfName);

        $architecturalDrawing = new ArchitecturalDrawing();
        $architecturalDrawing->project_id = $request->project_id;
        $architecturalDrawing->worker_id = $request->worker_id;
        $architecturalDrawing->task_title = $request->task_title;
        $architecturalDrawing->slug = Str::slug($request->task_title);
        $architecturalDrawing->task_description = $request->task_description;
        $architecturalDrawing->task_progress = $request->task_progress;
        $architecturalDrawing->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $architecturalDrawing->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        $architecturalDrawing->file = $pdfName;
        if (isset($request->status)) {
            $architecturalDrawing->status = true;
        } else {
            $architecturalDrawing->status = false;
        }
        $architecturalDrawing->save();
        return redirect()->route('architectural-drawing.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArchitecturalDrawing  $architecturalDrawing
     * @return \Illuminate\Http\Response
     */
    public function show(ArchitecturalDrawing $architecturalDrawing)
    {
        return view('admin.architectural-drawing.show', compact('architecturalDrawing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArchitecturalDrawing  $architecturalDrawing
     * @return \Illuminate\Http\Response
     */
    public function edit(ArchitecturalDrawing $architecturalDrawing)
    {
        $projects = Project::latest()->get();
        $workers = Worker::latest()->get();
        return view('admin.architectural-drawing.edit', compact('projects', 'workers', 'architecturalDrawing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArchitecturalDrawing  $architecturalDrawing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArchitecturalDrawing $architecturalDrawing)
    {
//         dd($request->all());

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
            $oldFile = public_path(). "/architectural-drawing-file/". $architecturalDrawing->file;
            if (file_exists($oldFile))
            {
                unlink($oldFile);
            }
            $pdfName = time() . '.' . $pdfFile->extension();
            $pdfFile->move(public_path('architectural-drawing-file'), $pdfName);
            $architecturalDrawing->file = $pdfName;
        }

        $architecturalDrawing->project_id = $request->project_id;
        $architecturalDrawing->worker_id = $request->worker_id;
        $architecturalDrawing->task_title = $request->task_title;
        $architecturalDrawing->slug = Str::slug($request->task_title);
        $architecturalDrawing->task_description = $request->task_description;
        $architecturalDrawing->task_progress = $request->task_progress;
        $architecturalDrawing->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $architecturalDrawing->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        if (isset($request->status)) {
            $architecturalDrawing->status = true;
        } else {
            $architecturalDrawing->status = false;
        }
        $architecturalDrawing->update();
        return redirect()->route('architectural-drawing.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArchitecturalDrawing  $architecturalDrawing
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArchitecturalDrawing $architecturalDrawing)
    {
        //
    }
}
