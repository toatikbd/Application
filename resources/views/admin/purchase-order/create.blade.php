@extends('layouts.app')
@section('title', 'Purchase Order')
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
                        <a href="{{ route('requisition.index') }}" class="btn btn-success waves-effect right-align-task-btn">
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
            <form action="{{ route('requisition.store') }}" method="POST">
                @csrf
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon bg-success">
                                            <i class="material-icons">search</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" placeholder="Search Requisition Number">
                                        </div>
                                        <span class="input-group-addon">
                                            <button type="button" class="btn btn-primary  waves-effect">
                                                <i class="material-icons" style="color: white">add_circle_outline</i> Add
                                            </button>
                                        </span>
                                    </div>
                                    <p class="text-center"><code>Please Select Requisition for Purchase Order</code></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="body table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="5">
                                                    <div class="demo-google-material-icon">
                                                        <i class="material-icons text-success">shopping_basket</i>
                                                        <span class="icon-name">Purchase Order</span>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>Action</th>
                                                <th>Product Name</th>
                                                <th>Unit</th>
                                                <th width="100px">Quantity</th>
                                                <th width="120px">Unit Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <a href="#"><i class="material-icons text-danger">delete_sweep</i></a>
                                                </th>
                                                <td>Otto</td>
                                                <td>piece</td>
                                                <td><input type="number" class="form-control"></td>
                                                <td><input type="number" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="4" class="text-right">
                                                    Grand Total
                                                </th>
                                                <td class="text-right">
                                                    <strong>5000</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="alert bg-green alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h2 class="text-center">Empty Orders</h2>
                                    <p class="text-center">There has no items to order <code>Please Select Requisition</code></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
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
                                    <label for="country_id">Country of Origin</label>

                                </div>
                            </div>
                            <label for="description">Order Description</label>
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
                            <label for="requisition_number">Requisition Number</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="requisition_number" name="requisition_number" autocomplete="off" class="form-control" placeholder="Enter ***">
                                </div>
                            </div>
                            <label for="requisition_type">Order Type</label>
                            <div class="form-group">
                                <div class="form-line custom-live-search">
                                    <select class="form-control show-tick" id="requisition_type" name="requisition_type" data-live-search="true">
                                        <option selected disabled>-- Please select --</option>
                                        <option name="requisition_type" value="Local">Local</option>
                                        <option name="requisition_type" value="Foreign">Foreign</option>
                                    </select>
                                </div>
                            </div>
                            <label for="project">Project</label>
                            <div class="form-group">
                                <div class="form-line custom-live-search">
                                    <select class="form-control show-tick" id="project" name="requisition_type" data-live-search="true">
                                        <option selected disabled>-- Please select --</option>
                                        <option name="requisition_type" value="Local">Local</option>
                                        <option name="requisition_type" value="Foreign">Foreign</option>
                                    </select>
                                </div>
                            </div>
                            <label for="supervisor">Supervisor</label>
                            <div class="form-group">
                                <div class="form-line custom-live-search">
                                    <select class="form-control show-tick" id="supervisor" name="requisition_type" data-live-search="true">
                                        <option selected disabled>-- Please select --</option>
                                        <option name="requisition_type" value="Local">Local</option>
                                        <option name="requisition_type" value="Foreign">Foreign</option>
                                    </select>
                                </div>
                            </div>
                            <label for="issue_date">Requisition Issue Date</label>
                            <div class="form-group">
                                <div class="form-line" id="bs_datepicker_container">
                                    <input type="text" name="issue_date" class="form-control" autocomplete="off" placeholder="Please choose a date...">
                                </div>
                            </div>
                            <label for="order_date">Order Date</label>
                            <div class="form-group">
                                <div class="form-line" id="bs_datepicker_container">
                                    <input type="text" name="order_date" class="form-control" autocomplete="off" placeholder="Please choose a date...">
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('purchase-order.create') }}" class="btn btn-danger waves-effect">
                                    <i class="material-icons">settings_backup_restore</i>
                                    <span>REFRESH</span>
                                </a>
                                <button type="submit"  class="btn btn-success waves-effect">
                                    <i class="material-icons">save</i>
                                    <span>ORDER</span>
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
