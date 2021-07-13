<?php

namespace App\Http\Controllers;

use App\Models\FinancialPlan;
use App\Models\Project;
use Illuminate\Http\Request;

class FinancialPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('expenses', 'purchaseOrders')->get();
        return view('admin.financial-plan.index', compact('projects'));
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
     * @param  \App\Models\FinancialPlan  $financialPlan
     * @return \Illuminate\Http\Response
     */
    public function show(FinancialPlan $financialPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FinancialPlan  $financialPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(FinancialPlan $financialPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FinancialPlan  $financialPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FinancialPlan $financialPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FinancialPlan  $financialPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(FinancialPlan $financialPlan)
    {
        //
    }
}
