<?php

namespace App\Http\Controllers;

use App\Models\ArchitecturalDrawing;
use Illuminate\Http\Request;

class ArchitecturalDrawingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.architectural-drawing.index');
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
     * @param  \App\Models\ArchitecturalDrawing  $architecturalDrawing
     * @return \Illuminate\Http\Response
     */
    public function show(ArchitecturalDrawing $architecturalDrawing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArchitecturalDrawing  $architecturalDrawing
     * @return \Illuminate\Http\Response
     */
    public function edit(ArchitecturalDrawing $architecturalDrawing)
    {
        //
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
        //
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
