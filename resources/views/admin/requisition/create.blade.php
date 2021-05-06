@extends('layouts.app')
@section('title', 'Requisition')
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
            <h2>Requisition</h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li><a href="{{ route('procurement.index') }}"><i class="material-icons">library_books</i> Procurement</a></li>
                <li class="active"><i class="material-icons">archive</i> Requisition</li>
            </ol>
        </div>

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>TASK INFOS</h2>
                        <a href="{{ route('requisition.index') }}" class="btn btn-success waves-effect right-align-task-btn">
                            <i class="material-icons">visibility</i>
                            <span>View All Requisition</span>
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
            <form action="{{ route('requisition.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="body">
                            <label for="title">Requisition Title</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="title" name="title" autocomplete="off" class="form-control" placeholder="Enter Title">
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="category">Category</label>
                                    <div class="form-group">
                                        <div class="form-line custom-live-search">
                                            <select class="form-control show-tick" id="category" name="worker_id" data-live-search="true">
                                                <option selected disabled>-- Please select --</option>
                                                <option>Burger, Shake and a Smile</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="category">Requisition Type</label>
                                    <div class="form-group">
                                        <div class="form-line custom-live-search">
                                            <select class="form-control show-tick" id="category" name="worker_id" data-live-search="true">
                                                <option selected disabled>-- Please select --</option>
                                                <option>Local</option>
                                                <option>Foreign</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="title">Manufacturer/ Company Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="manufacturer" name="manufacturer" autocomplete="off" class="form-control" placeholder="Enter Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="title">Country of Origin</label>
                                    <div class="form-group">
                                        <div class="form-line custom-live-search">
                                            <select class="form-control show-tick" id="category" name="worker_id" data-live-search="true">
                                                <option selected disabled>-- Please select --</option>
                                                <option>Local</option>
                                                <option>Foreign</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="description">Requisition Description</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" id="description" name="description" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body">
                            <label for="product_price">Product Price</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="product_price" name="price" autocomplete="off" class="form-control" placeholder="Enter Price">
                                </div>
                            </div>
                            <label for="needed_date">Needed Date</label>
                            <div class="form-group">
                                <div class="form-line" id="bs_datepicker_container">
                                    <input type="text" name="needed_date" class="form-control" autocomplete="off" placeholder="Please choose a date...">
                                </div>
                            </div>
                            <label for="select_worker">Select Project</label>
                            <select class="form-control show-tick" id="category" name="worker_id" data-live-search="true">
                                <option selected disabled>-- Please select --</option>
                                <option>Local</option>
                                <option>Foreign</option>
                            </select>
{{--                            <div class="form-group {{ $errors->has('projects') ? 'focused error' : '' }}">--}}
{{--                                <div class="form-line custom-live-search">--}}
{{--                                    <select class="form-control show-tick" id="select_worker" name="project_id" data-live-search="true">--}}
{{--                                        <option selected disabled>-- Please select project--</option>--}}
{{--                                        @foreach($projects as $key => $project)--}}
{{--                                            <option value="{{ $project->id }}"> {{ $project->name }} </option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}


                            <label for="select_worker">Select Supervisor</label>
                            <select class="form-control show-tick" id="category" name="worker_id" data-live-search="true">
                                <option selected disabled>-- Please select --</option>
                                <option>Local</option>
                                <option>Foreign</option>
                            </select>
{{--                            <div class="form-group {{ $errors->has('workers') ? 'focused error' : '' }}">--}}
{{--                                <div class="form-line custom-live-search">--}}
{{--                                    <select class="form-control show-tick" id="select_worker" name="worker_id" data-live-search="true">--}}
{{--                                        <option selected disabled>-- Please select --</option>--}}
{{--                                        @foreach($workers as $key => $worker)--}}
{{--                                            <option value="{{ $worker->id }}"> {{ $worker->name }} </option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="text-center">
                                <a href="{{ route('worker.index') }}" class="btn btn-danger waves-effect">
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
@endpush
