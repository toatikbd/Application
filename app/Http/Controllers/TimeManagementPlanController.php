<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\TimeManagementPlan;
use Illuminate\Http\Request;

class TimeManagementPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('mobilizations', 'siteEvaluations')->get();
        return view('admin.time-management-plan.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\TimeManagementPlan  $timeManagementPlan
     * @return \Illuminate\Http\Response
     */
    public function show(TimeManagementPlan $timeManagementPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeManagementPlan  $timeManagementPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeManagementPlan $timeManagementPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TimeManagementPlan  $timeManagementPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeManagementPlan $timeManagementPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeManagementPlan  $timeManagementPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeManagementPlan $timeManagementPlan)
    {
        //
    }
}
