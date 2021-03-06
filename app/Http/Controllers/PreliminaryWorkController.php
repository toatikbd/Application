<?php

namespace App\Http\Controllers;

use App\Models\Mobilization;
use App\Models\PreliminaryWork;
use App\Models\SiteClearance;
use App\Models\SiteEvaluation;
use Illuminate\Http\Request;

class PreliminaryWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siteEvaluations = SiteEvaluation::all()->count();
        $mobilizations = Mobilization::all()->count();
        $siteClearances = SiteClearance::all()->count();
        return view('admin.preliminary-work.index', compact('siteEvaluations', 'mobilizations', 'siteClearances'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.preliminary-work.create');
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
     * @param  \App\Models\PreliminaryWork  $preliminaryWork
     * @return \Illuminate\Http\Response
     */
    public function show(PreliminaryWork $preliminaryWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PreliminaryWork  $preliminaryWork
     * @return \Illuminate\Http\Response
     */
    public function edit(PreliminaryWork $preliminaryWork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PreliminaryWork  $preliminaryWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PreliminaryWork $preliminaryWork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PreliminaryWork  $preliminaryWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreliminaryWork $preliminaryWork)
    {
        //
    }
}
