<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contractors = Contractor::latest()->get();
        return view('admin.contractor.index', compact('contractors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::latest()->get();
        return view('admin.contractor.create', compact('projects'));
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
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $image = $request->file('photo');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('contractors'), $imageName);

        $contractor = new Contractor();
        $contractor->project_id = $request->project_id;
        $contractor->name = $request->name;
        $contractor->slug = Str::slug($request->name);
        $contractor->mobile = $request->mobile;
        $contractor->email = $request->email;
        $contractor->address = $request->address;
        $contractor->photo = $imageName;
        $contractor->save();
        return redirect()->route('contractor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contractor  $contractor
     * @return \Illuminate\Http\Response
     */
    public function show(Contractor $contractor)
    {
        $projects = Project::latest()->get();
        return view('admin.contractor.show', compact('contractor', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contractor  $contractor
     * @return \Illuminate\Http\Response
     */
    public function edit(Contractor $contractor)
    {
        $projects = Project::latest()->get();
        return view('admin.contractor.edit', compact('projects', 'contractor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contractor  $contractor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contractor $contractor)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $image = $request->file('photo');
        if($image){
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('contractors'), $imageName);
            $contractor->photo = $imageName;
        }

        $contractor->project_id = $request->project_id;
        $contractor->name = $request->name;
        $contractor->slug = Str::slug($request->name);
        $contractor->mobile = $request->mobile;
        $contractor->email = $request->email;
        $contractor->address = $request->address;
        $contractor->update();
        return redirect()->route('contractor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contractor  $contractor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contractor $contractor)
    {
        //
    }
}
