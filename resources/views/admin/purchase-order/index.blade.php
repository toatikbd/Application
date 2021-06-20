@extends('layouts.app')
@section('title', 'Purchase Order')
@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('admin') }}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('admin') }}/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
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
           <h2>Purchase Order <span class="badge bg-blue">100</span></h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li><a href="{{ route('procurement.index') }}"><i class="material-icons">library_books</i> Procurement</a></li>
                <li class="active"><i class="material-icons">archive</i> Purchase Order</li>
            </ol>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                
            </div>
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Purchase Order Invoice</h2>
                        <a href="{{ route('purchase-order.create') }}" class="btn btn-success waves-effect right-align-task-btn">
                            <i class="material-icons">add</i>
                            <span>Create a Purchase Order</span>
                        </a>
                    </div>
                    <div class="body">
                        <form action="{{route('getPurchaseOrderForm')}}" method="GET">
                            <div class="input-group">
                                <span class="input-group-addon bg-success">
                                    <i class="material-icons">search</i>
                                </span>
                                <div class="form-group {{ $errors->has('requisitions') ? 'focused error' : '' }}">
                                    <div class="form-line custom-live-search">
                                        <select class="form-control show-tick" id="select_worker" name="requisition_id" data-live-search="true">
                                            <option selected disabled>-- Please select requisition--</option>
                                            @foreach($requisitions as $key => $requisition)
                                                <option value="{{ $requisition->id }}"> {{ $requisition->requisition_no }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <span class="input-group-addon">
                                    <button type="submit" class="btn btn-primary  waves-effect">
                                        <i class="material-icons" style="color: white">add_circle_outline</i> Create a Purchase Order
                                    </button>
                                </span>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered dashboard-task-infos table-striped dataTable js-basic-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Manufacturer</th>
                                    <th>Price</th>
                                    <th>Needed Date</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @foreach ($purchaseOrders as $key => $order)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $key + 1 }}</td>--}}
{{--                                    <td>{{ Str::limit($order->title, 10) }}</td>--}}
{{--                                    <td>{{ optional($order->requisitionCategory)->name }}</td>--}}
{{--                                    <td>{{ $order->requisition_type }}</td>--}}
{{--                                    <td>{{ $order->manufacturer }}</td>--}}
{{--                                    <td>{{ $order->price }}</td>--}}
{{--                                    <td>{{ \Carbon\Carbon::parse($order->needed_date)->format('d/m/Y')}}</td>--}}
{{--                                    <td class="text-right">--}}
{{--                                        <a href="{{ route('requisition.show', $order->id) }}" class="btn btn-primary btn-xs waves-effect">--}}
{{--                                            <i class="material-icons">visibility</i>--}}
{{--                                        </a>--}}
{{--                                        <a href="{{ route('requisition.edit', $order->id) }}" class="btn btn-warning btn-xs waves-effect">--}}
{{--                                            <i class="material-icons">edit</i>--}}
{{--                                        </a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                @endforeach--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Task Info -->
        </div>
    </div>

@endsection
@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('admin') }}/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('admin') }}/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="{{ asset('admin') }}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="{{ asset('admin') }}/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="{{ asset('admin') }}/js/pages/tables/jquery-datatable.js"></script>
@endpush
