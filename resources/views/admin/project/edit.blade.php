@extends('layouts.app')
@section('title', 'Edit Project')
@push('css')
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ asset('admin') }}/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <!-- Bootstrap DatePicker Css -->
    <link href="{{ asset('admin') }}/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2 class="text-center">Edit Projects</h2>
        </div>
        <div class="row clearfix">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form action="{{ route('project.update', $project->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <label for="project_title">Project Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="project_title" name="name" value="{{ $project->name  }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your Project Title">
                                    </div>
                                    @error('name')
                                    <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <label for="owner">Owner Name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="owner" name="owner" value="{{ $project->owner }}" autocomplete="off" class="form-control @error('owner') is-invalid @enderror" placeholder="Enter Project Owner Name">
                                            </div>
                                            @error('owner')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="amount">Estimate Amount</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="amount" name="amount" value="{{ $project->amount }}" autocomplete="off" class="form-control @error('amount') is-invalid @enderror" placeholder="Enter Project Amount">
                                            </div>
                                            @error('amount')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <label for="end_date">Approximate Time</label>
                                <div class="form-line">
                                    <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                        <div class="form-line">
                                            <input type="text" name="start_date" value="{{ \Carbon\Carbon::parse($project->start_date)->format('d-m-Y')}}" autocomplete="off" class="form-control" placeholder="Date start..." au>
                                        </div>
                                        <span class="input-group-addon">to</span>
                                        <div class="form-line">
                                            <input type="text" name="end_date" value="{{ \Carbon\Carbon::parse($project->end_date)->format('d-m-Y')}}" autocomplete="off" class="form-control" placeholder="Date end..." autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <label for="location">Location</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="location" name="location" value="{{ $project->location }}" autocomplete="off" class="form-control @error('location') is-invalid @enderror" placeholder="Enter Project Location">
                                    </div>
                                    @error('location')
                                    <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <label for="description">Project Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea id="description" name="description" cols="30" rows="5" class="form-control no-resize" aria-required="true">{{ $project->description }}</textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('project.create') }}" class="btn btn-danger m-t-15 waves-effect">BACK</a>
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- #END# Vertical Layout -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{ asset('admin') }}/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="{{ asset('admin') }}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
@endpush
