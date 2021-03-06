<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SiteEvaluation;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiteEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siteEvaluations = SiteEvaluation::latest()->get();
        return view('admin.site-evaluation.index', compact('siteEvaluations'));
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
        return view('admin.site-evaluation.create', compact('projects', 'workers'));
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
        $pdfFile->move(public_path('site-evaluation-file'), $pdfName);

        $siteEvaluation = new SiteEvaluation();
        $siteEvaluation->project_id = $request->project_id;
        $siteEvaluation->worker_id = $request->worker_id;
        $siteEvaluation->task_title = $request->task_title;
        $siteEvaluation->slug = Str::slug($request->task_title);
        $siteEvaluation->task_description = $request->task_description;
        $siteEvaluation->task_progress = $request->task_progress;
        $siteEvaluation->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $siteEvaluation->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        $siteEvaluation->file = $pdfName;
        if (isset($request->status)) {
            $siteEvaluation->status = true;
        } else {
            $siteEvaluation->status = false;
        }
        $siteEvaluation->save();
        return redirect()->route('site-evaluation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SiteEvaluation  $siteEvaluation
     * @return \Illuminate\Http\Response
     */
    public function show(SiteEvaluation $siteEvaluation)
    {
        return view('admin.site-evaluation.show', compact('siteEvaluation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteEvaluation  $siteEvaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteEvaluation $siteEvaluation)
    {
        $projects = Project::latest()->get();
        $workers = Worker::latest()->get();
        return view('admin.site-evaluation.edit', compact('projects','workers', 'siteEvaluation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiteEvaluation  $siteEvaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteEvaluation $siteEvaluation)
    {
        // dd($request->all());

        $this->validate($request, [
            'task_title' => 'required',
            'task_description' => 'required',
            'project_id' => 'required',
            'worker_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        // return $pdfFile = $request->file('file');

        if ($pdfFile = $request->file('file'))
        {
            $oldFile = public_path(). "/site-evaluation-file/". $siteEvaluation->file;
            if (file_exists($oldFile))
            {
                unlink($oldFile);
            }
            $pdfName = time() . '.' . $pdfFile->extension();
            $pdfFile->move(public_path('site-evaluation-file'), $pdfName);
            $siteEvaluation->file = $pdfName;
        }

        $siteEvaluation->project_id = $request->project_id;
        $siteEvaluation->worker_id = $request->worker_id;
        $siteEvaluation->task_title = $request->task_title;
        $siteEvaluation->slug = Str::slug($request->task_title);
        $siteEvaluation->task_description = $request->task_description;
        $siteEvaluation->task_progress = $request->task_progress;
        $siteEvaluation->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $siteEvaluation->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        if (isset($request->status)) {
            $siteEvaluation->status = true;
        } else {
            $siteEvaluation->status = false;
        }
        $siteEvaluation->update();
        return redirect()->route('site-evaluation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteEvaluation  $siteEvaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteEvaluation $siteEvaluation)
    {
        //
    }
}
