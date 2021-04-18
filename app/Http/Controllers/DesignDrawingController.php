<?php

namespace App\Http\Controllers;

use App\Models\DesignDrawing;
use Illuminate\Http\Request;

class DesignDrawingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.design-drawing.index');
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
     * @param  \App\Models\DesignDrawing  $designDrawing
     * @return \Illuminate\Http\Response
     */
    public function show(DesignDrawing $designDrawing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DesignDrawing  $designDrawing
     * @return \Illuminate\Http\Response
     */
    public function edit(DesignDrawing $designDrawing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DesignDrawing  $designDrawing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DesignDrawing $designDrawing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DesignDrawing  $designDrawing
     * @return \Illuminate\Http\Response
     */
    public function destroy(DesignDrawing $designDrawing)
    {
        //
    }
}
