@extends('layouts.app')
@section('title', 'Expense')
@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('admin') }}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <style>
        .bootstrap-select .bs-searchbox .form-control, .bootstrap-select .bs-actionsbox .form-control, .bootstrap-select .bs-donebutton .form-control {
            margin-left: 1px!important;
            padding-left: 35px!important;
        }
    </style>
@endpush
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>All Expense <span class="badge bg-blue"></span></h2>
        <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
            <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
            <li><a href="{{ route('expense.index') }}"><i class="material-icons">gesture</i> Expense</a></li>
            <li class="active"><i class="material-icons">archive</i>Add Expense</li>
        </ol>
    </div>
    <div class="row clearfix">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <form action="{{ route('expense.store') }}" method="POST">
                            @csrf
                            <label for="title">Expense Title</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="title" name="title" autocomplete="off" class="form-control @error('title') is-invalid @enderror" placeholder="Expense Title">
                                </div>
                                @error('title')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                            <label for="amount">Expense Amount</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="amount" name="amount" autocomplete="off" class="form-control @error('amount') is-invalid @enderror" placeholder="Expense Amount">
                                </div>
                                @error('amount')
                                <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                            <label for="select_worker">Select Employee</label>
                            <div class="form-group {{ $errors->has('employees') ? 'focused error' : '' }}">
                                <div class="form-line custom-live-search">
                                    <select class="form-control show-tick" id="select_worker" name="employee_id" data-live-search="true">
                                        <option selected disabled>-- Please select employee--</option>
                                        @foreach($employees as $key => $employee)
                                            <option value="{{ $employee->id }}"> {{ $employee->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label for="select_worker">Select Project</label>
                            <div class="form-group {{ $errors->has('projects') ? 'focused error' : '' }}">
                                <div class="form-line custom-live-search">
                                    <select class="form-control show-tick" id="select_worker" name="project_id" data-live-search="true">
                                        <option selected disabled>-- Please select project--</option>
                                        @foreach($projects as $key => $project)
                                            <option value="{{ $project->id }}"> {{ $project->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label for="note">Note</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" id="note" name="note" autocomplete="off" class="form-control no-resize" placeholder="Note"></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg m-t-15 waves-effect">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- #END# Vertical Layout -->
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Select Plugin Js -->
        <script src="{{ asset('admin') }}/plugins/bootstrap-select/js/bootstrap-select.js"></script>
@endpush
