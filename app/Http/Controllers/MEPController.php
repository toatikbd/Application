<?php

namespace App\Http\Controllers;

use App\Models\MEP;
use App\Models\Project;
use App\Models\Worker;
use Illuminate\Http\Request;

class MEPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meps = MEP::latest()->get();
        return view('admin.mep.index', compact('meps'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MEP  $mEP
     * @return \Illuminate\Http\Response
     */
    public function show(MEP $mEP)
    {
        //
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
