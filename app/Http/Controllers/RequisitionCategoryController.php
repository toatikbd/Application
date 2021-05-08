<?php

namespace App\Http\Controllers;

use App\Models\RequisitionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RequisitionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.requisition-category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requisitionCategories = RequisitionCategory::latest()->get();
        return view('admin.requisition-category.create', compact('requisitionCategories'));
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
            'name' => 'required'
        ]);
        $category = new RequisitionCategory();
        $category->name = $request->name;
        $category->slug = Str::slug($request-> name);
        $category->note = $request->note;
        $category->save();
        return redirect()->route('requisition-category.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequisitionCategory  $requisitionCategory
     * @return \Illuminate\Http\Response
     */
    public function show(RequisitionCategory $requisitionCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequisitionCategory  $requisitionCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(RequisitionCategory $requisitionCategory)
    {
        return view('admin.requisition-category.edit', compact('requisitionCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequisitionCategory  $requisitionCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequisitionCategory $requisitionCategory)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $requisitionCategory->name = $request->name;
        $requisitionCategory->slug = Str::slug($request-> name);
        $requisitionCategory->note = $request->note;
        $requisitionCategory->update();
        return redirect()->route('requisition-category.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequisitionCategory  $requisitionCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequisitionCategory $requisitionCategory)
    {
        $requisitionCategory->delete();
        return redirect()->back();
    }
}
