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
        return view('admin.mep.index', compact('mEPs'));
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
        return view('admin.mep.create', compact('projects', 'workers'));
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
        $image->move(public_path('mep'), $imageName);

        $mEP = new MEP();
        $mEP->project_id = $request->project_id;
        $mEP->worker_id = $request->worker_id;
        $mEP->task_title = $request->task_title;
        $mEP->slug = Str::slug($request->task_title);
        $mEP->task_description = $request->task_description;
        $mEP->task_progress = $request->task_progress;
        $mEP->start_date = Carbon::createFromFormat('d-m-Y',$request->start_date);
        $mEP->end_date = Carbon::createFromFormat('d-m-Y',$request->end_date);
        $mEP->file = $imageName;
        if (isset($request->status)) {
            $mEP->status = true;
        } else {
            $mEP->status = false;
        }
        $mEP->save();
        return redirect()->route('mep.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MEP  $mEP
     * @return \Illuminate\Http\Response
     */
    public function show(MEP $mEP)
    {
//        return view('admin.mep.show', compact('mEP'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MEP  $mEP
     * @return \Illuminate\Http\Response
     */
    public function edit(MEP $mEP)
    {
        //
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
        //
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
