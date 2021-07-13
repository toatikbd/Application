@extends('layouts.app')
@section('title', 'Mobilization')
@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('admin') }}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ asset('admin') }}/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <!-- Bootstrap DatePicker Css -->
    <link href="{{ asset('admin') }}/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
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
            <h2>Mobilization</h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li><a href="{{ route('mobilization.index') }}"><i class="material-icons">library_books</i> Preliminary Work</a></li>
                <li class="active"><i class="material-icons">archive</i> Mobilization</li>
            </ol>
        </div>

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>TASK INFOS</h2>
                        <a href="{{ route('mobilization.index') }}" class="btn btn-success waves-effect right-align-task-btn">
                            <i class="material-icons">visibility</i>
                            <span>View All Tasks</span>
                        </a>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong> Whoops!</strong> There were some problems with your input<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <form action="{{ route('mobilization.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="body">
                            <label for="task_title">Task Title</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="task_title" name="task_title" autocomplete="off" class="form-control" placeholder="Enter Task Title">
                                </div>
                            </div>
                            <label for="task_description">Task Description</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="task_description" name="task_description" autocomplete="off" class="form-control" placeholder="Please type your Task description in shorthand">
                                </div>
                            </div>
                            <div class="row clearfix">
                            <div class="col-md-4">
                                <label for="task_progress">Work Progress</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="task_progress" autocomplete="off" class="form-control" placeholder="10%">
                                        </div>
                                        <span class="input-group-addon">%</span>
                                        <label>Value Min 1 to Max 100</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label for="task_file">File Upload</label>
                                <div class="form-group">
                                    <div>
                                        <input type="file" id="task_file" name="file" class="btn btn-primary btn-lg waves-effect" onchange="previewFiles()"/>
                                        <div class="preview"></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body">
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

                            <label for="end_date">Date</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                        <div class="form-line">
                                            <input type="text" name="start_date" autocomplete="off" class="form-control" placeholder="Date start..." au>
                                        </div>
                                        <span class="input-group-addon">to</span>
                                        <div class="form-line">
                                            <input type="text" name="end_date" autocomplete="off" class="form-control" placeholder="Date end..." autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="select_worker">Select Supervisor</label>
                            <div class="form-group {{ $errors->has('workers') ? 'focused error' : '' }}">
                                <div class="form-line custom-live-search">
                                    <select class="form-control show-tick" id="select_worker" name="worker_id" data-live-search="true">
                                        <option selected disabled>-- Please select --</option>
                                        @foreach($workers as $key => $worker)
                                            <option value="{{ $worker->id }}"> {{ $worker->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label for="status">Work Status</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="checkbox" id="the_end"  name="status" value="1" class="filled-in chk-col-red"/>
                                    <label for="the_end">THE END</label>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('mobilization.index') }}" class="btn btn-danger waves-effect">
                                    <i class="material-icons">settings_backup_restore</i>
                                    <span>BACK</span>
                                </a>
                                <button type="submit"  class="btn btn-success waves-effect">
                                    <i class="material-icons">save</i>
                                    <span>SAVE</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- #END# Task Info -->
        </div>
    </div>
@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('admin') }}/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{ asset('admin') }}/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="{{ asset('admin') }}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <script>


    </script>
@endpush
