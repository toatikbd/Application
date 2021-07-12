<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Expense;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::latest()->get();
        return view('admin.expense.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::latest()->get();
        $employees = Employee::latest()->get();
        return view('admin.expense.create', compact('projects', 'employees'));
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
            'amount' => 'required',
        ]);

        $expense = new Expense();
        $expense->title = $request->title;
        $expense->slug = Str::slug($request-> title);
        $expense->amount = $request->amount;
        $expense->project_id = $request->project_id;
        $expense->employee_id = $request->employee_id;
        $expense->note = $request->note;
        $expense->save();
        return redirect()->route('expense.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $projects = Project::latest()->get();
        $employees = Employee::latest()->get();
        return view('admin.expense.edit', compact('expense', 'projects', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $this->validate($request, [
            'title' => 'required',
            'amount' => 'required',
        ]);

        $expense->title = $request->title;
        $expense->slug = Str::slug($request-> title);
        $expense->amount = $request->amount;
        $expense->project_id = $request->project_id;
        $expense->employee_id = $request->employee_id;
        $expense->note = $request->note;
        $expense->save();
        return redirect()->route('expense.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->back();
    }
}
