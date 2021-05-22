<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Project;
use App\Models\Requisition;
use App\Models\RequisitionCategory;
use App\Models\Unit;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitions = Requisition::latest()->get();
        return view('admin.requisition.index', compact('requisitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workers = Worker::latest()->get();
        $projects = Project::latest()->get();
        $requisitionCategories = RequisitionCategory::latest()->get();
        $countries = Country::latest()->get();
        $units = Unit::latest()->get();
        return view('admin.requisition.create', compact('workers', 'projects', 'requisitionCategories', 'countries', 'units'));
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
            'title' => 'required',
            'category_id' => 'required',
            'requisition_type' => 'required',
            'manufacturer' => 'required',
            'country_id' => 'required',
            'project_id' => 'required',
            'worker_id' => 'required',
        ]);

        $requisition = new Requisition();
        $requisition->title = $request->title;
        $requisition->slug = Str::slug($request->title);
        $requisition->category_id = $request->category_id;
        $requisition->requisition_type = $request->requisition_type;
        $requisition->manufacturer = $request->manufacturer;
        $requisition->country_id = $request->country_id;
        $requisition->description = $request->description;
        $requisition->price = $request->price;
        $requisition->quantity = $request->quantity;
        $requisition->symbol = $request->unit_id;
        $requisition->project_id = $request->project_id;
        $requisition->worker_id = $request->worker_id;
        $requisition->needed_date = Carbon::createFromFormat('d-m-Y', $request->needed_date);
        if (isset($request->approved_by)) {
            $requisition->approved_by = true;
        } else {
            $requisition->approved_by = false;
        }
        $requisition->generateRequisitionNumber();
        $requisition->save();
        return redirect()->route('requisition.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function show(Requisition $requisition)
    {
        return view ('admin.requisition.show', compact('requisition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisition $requisition)
    {
        return view('admin.requisition.edit', compact('requisition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisition $requisition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisition $requisition)
    {
        //
    }
}
