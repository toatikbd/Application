<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->get();
        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create');
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
            'email' => 'required|unique:employees|max:255',
            'mobile' => 'required|unique:employees|max:255',
            'job_title' => 'required',
            'department' => 'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg'
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('uploaded/employee'), $imageName);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->slug = Str::slug($request-> name);
        $employee->email = $request->email;
        $employee->mobile = $request->mobile;
        $employee->job_title = $request->job_title;
        $employee->department = $request->department;
        $employee->image = $imageName;
        $employee->save();
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'job_title' => 'required',
            'department' => 'required'
        ]);

        if ($imageFile = $request->file('image'))
        {
            $oldImage = public_path(). "/uploaded/employee/". $employee->image;
            if (file_exists($oldImage))
            {
                unlink($oldImage);
            }
            $imageName = time() . '.' . $imageFile->extension();
            $imageFile->move(public_path('uploaded/employee'), $imageName);
            $employee->image = $imageName;
        }

        $employee->name = $request->name;
        $employee->slug = Str::slug($request-> name);
        $employee->email = $request->email;
        $employee->mobile = $request->mobile;
        $employee->job_title = $request->job_title;
        $employee->department = $request->department;
        $employee->save();
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $oldImage = public_path(). "/uploaded/employee/". $employee->image;
        if (file_exists($oldImage))
        {
            unlink($oldImage);
        }
        $employee->delete();
        return redirect()->back();
    }
}
