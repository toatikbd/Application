@extends('layouts.app')
@section('title', 'Create a Purchase Order')
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
            <h2>Purchase Order</h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li><a href="{{ route('procurement.index') }}"><i class="material-icons">library_books</i> Procurement</a></li>
                <li class="active"><i class="material-icons">archive</i> Purchase Order</li>
            </ol>
        </div>

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>TASK INFOS</h2>
                        <a href="{{ route('purchase-order.index') }}" class="btn btn-success waves-effect right-align-task-btn">
                            <i class="material-icons">visibility</i>
                            <span>View All Purchase Order</span>
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
            <form action="{{ route('purchase-order.store') }}" method="POST">
                @csrf
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="body">
                            <label for="title">Requisition Title</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="title" name="title" value="{{$requisition->title}}" autocomplete="off" class="form-control" placeholder="Enter Title">
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="requisition_category">Category</label>
                                    <div class="form-group {{ $errors->has('requisitionCategories') ? 'focused error' : '' }}">
                                        <div class="form-line custom-live-search">
                                            <select class="form-control show-tick" id="requisition_category" name="category_id" data-live-search="true">
                                                <option selected disabled>-- Please select project--</option>
                                                @foreach($requisitionCategories as $key => $category)
                                                    <option {{ $category->id == $requisition->category_id ? 'selected' : '' }} value="{{ $category->id }}"> {{ $category->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="requisition_type">Requisition Type</label>
                                    <div class="form-group">
                                        <div class="form-line custom-live-search">
                                            <select class="form-control show-tick" id="requisition_type" name="requisition_type" data-live-search="true">
                                                <option selected disabled>-- Please select --</option>
                                                <option name="requisition_type" value="Local" {{ $requisition->requisition_type == 'Local' ? 'selected' : '' }}>Local</option>
                                                <option name="requisition_type" value="Foreign" {{ $requisition->requisition_type == 'Foreign' ? 'selected' : '' }}>Foreign</option>
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
                                            <input type="text" id="manufacturer" name="manufacturer" value="{{$requisition->manufacturer}}" autocomplete="off" class="form-control" placeholder="Enter Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="country_id">Country of Origin</label>
                                    <div class="form-group {{ $errors->has('countries') ? 'focused error' : '' }}">
                                        <div class="form-line custom-live-search">
                                            <select class="form-control show-tick" id="country_id" name="country_id" data-live-search="true">
                                                <option selected disabled>-- Please select project--</option>
                                                @foreach($countries as $key => $country)
                                                    <option {{ $country->id == $requisition->country_id ? 'selected' : '' }} value="{{ $country->id }}"> {{ $country->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="select_worker">Select Project</label>
                                    <div class="form-group {{ $errors->has('projects') ? 'focused error' : '' }}">
                                        <div class="form-line custom-live-search">
                                            <select class="form-control show-tick" id="select_project" name="project_id" data-live-search="true">
                                                <option selected disabled>-- Please select project--</option>
                                                @foreach($projects as $key => $project)
                                                    <option {{ $project->id == $requisition->project_id ? 'selected' : '' }} value="{{ $project->id }}"> {{ $project->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="select_worker">Select Supervisor</label>
                                    <div class="form-group {{ $errors->has('workers') ? 'focused error' : '' }}">
                                        <div class="form-line custom-live-search">
                                            <select class="form-control show-tick" id="select_worker" name="worker_id" data-live-search="true">
                                                <option selected disabled>-- Please select --</option>
                                                @foreach($workers as $key => $worker)
                                                    <option {{ $worker->id == $requisition->worker_id ? 'selected' : '' }} value="{{$worker->id}}"> {{ $worker->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="description">Requisition Remarks</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" id="description" name="description" class="form-control no-resize" placeholder="Please type what you want...">{{$requisition->description}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body">
                            <label for="requisition_no">Requisition No</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="requisition_no" readonly name="requisition_no" value="{{ $requisition->requisition_no }}" autocomplete="off" class="form-control" placeholder="requisition no">
                                    <input type="hidden" name="requisition_id" value="{{$requisition->id}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <label for="product_price">Unit Price</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="product_price" name="price" value="{{$requisition->price}}" autocomplete="off" class="form-control" placeholder="Enter Price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label for="select_unit">Unit Type</label>
                                    <div class="form-group {{ $errors->has('units') ? 'focused error' : '' }}">
                                        <div class="form-line custom-live-search">
                                            <select class="form-control show-tick" id="select_unit" name="unit_id" data-live-search="true">
                                                <option selected disabled>-- Unit--</option>
                                                @foreach($units as $key => $unit)
                                                    <option {{ $unit->id == $requisition->unit_id ? 'selected' : '' }} value="{{ $unit->id }}"> {{ $unit->symbol }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <label for="quantity">Quantity</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="quantity" name="quantity" value="{{$requisition->quantity}}" autocomplete="off" class="form-control" placeholder="Enter Quantity">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label for="total_price">Total Price</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="total_price" name="total_price" value="{{$requisition->price * $requisition->quantity}}" autocomplete="off" class="form-control" placeholder="Total Price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="needed_date">Issue Date</label>
                            <div class="form-group">
                                <div class="form-line" id="bs_datepicker_container">
                                    <input type="text" name="needed_date" value="{{ \Carbon\Carbon::parse($requisition->needed_date)->format('d-m-Y')}}" class="form-control" autocomplete="off" placeholder="Please choose a date...">
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('purchase-order.index') }}" class="btn btn-danger waves-effect">
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
