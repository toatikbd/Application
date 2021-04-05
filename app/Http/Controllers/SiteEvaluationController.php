<?php

namespace App\Http\Controllers;

use App\Models\SiteEvaluation;
use Illuminate\Http\Request;

class SiteEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.site-evaluation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.site-evaluation.create');
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
     * @param  \App\Models\SiteEvaluation  $siteEvaluation
     * @return \Illuminate\Http\Response
     */
    public function show(SiteEvaluation $siteEvaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteEvaluation  $siteEvaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteEvaluation $siteEvaluation)
    {
        //
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
        //
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
