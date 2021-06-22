@extends('layouts.app')
@section('title', 'View PO Invoice')
@push('css')
   <style>
        .table-bordered tbody tr td, .table-bordered tbody tr th {
            border: 1px solid #3e3e3e!important;
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
                <li><a href="{{ route('purchase-order.index') }}"><i class="material-icons">library_books</i> Purchase Order</a></li>
                <li class="active"><i class="material-icons">archive</i> View Invoice</li>
            </ol>
        </div>
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Purchase Order Invoice Details <span class="badge bg-green">{{ ($purchaseOrder->title) }}</span></h2>
                        <div class="btn-group btn-group-md right-align-task-btn" role="group" aria-label="Large button group">
                            <a href="{{ route('purchase-order.index') }}" class="btn bg-pink waves-effect">
                                <i class="material-icons">visibility</i>
                                <span>View All</span>
                            </a>
                            <button type="button" onclick="printDiv('printableArea')" class="btn bg-warning waves-effect"><i class="material-icons">print</i></button>
                        </div>
                    </div>
                    <div class="body">
                        <div id="printableArea">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered dashboard-task-infos">
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <img src="{{ asset('admin') }}/images/logo.png" width="100" height="100" alt="User" />
                                            </td>
                                            <td colspan="2">
                                                <h4>TZ Interior Studio</h4>
                                                <p>
                                                    <strong>Mobile:</strong> 880-2-41040028<br>
                                                    <strong>Email:</strong> info@tzinteriorstudio.com<br>
                                                    <strong>Website:</strong> www.tzinteriorstudio.com<br>
                                                    <strong>Address:</strong> House #48, Flat #B-2, Road #25, Banani, Dhaka.
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h4>INVOICE</h4>
                                                <p>
                                                    <strong>Project Name:</strong> {{ $purchaseOrder->project->name }}<br>
                                                    <strong>Owner Name:</strong> {{ $purchaseOrder->project->owner }}<br>
                                                    <strong>Address:</strong> {{ $purchaseOrder->project->location }}<br>
                                                </p>
                                            </td>
                                            <td colspan="2">
                                                <p>
                                                    <strong>Requisition Number:</strong> {{ $purchaseOrder->requisition_no }}<br>
                                                    <strong>Requisition Date:</strong> {{ \Carbon\Carbon::parse($purchaseOrder->needed_date)->format('d/m/Y')}}<br>
                                                    <strong>Order Number:</strong> {{ $purchaseOrder->po_no }}<br>
                                                    <strong>Order Date:</strong> {{ \Carbon\Carbon::parse($purchaseOrder->created_at)->format('d/m/Y')}}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"></td>
                                        </tr>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total Price</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $purchaseOrder->title }}</td>
                                            <td>{{ $purchaseOrder->quantity }}</td>
                                            <td>{{ $purchaseOrder->price }}</td>
                                            <td>{{ $purchaseOrder->total_price }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Basic Information</td>
                                        </tr>
                                        <tr>
                                            <td>Country of Origin: {{ $purchaseOrder->requisitionCountry->name }}</th>
                                            <td>Manufacturer: {{ $purchaseOrder->manufacturer }}</td>
                                            <td>Purchase Order Type: {{ $purchaseOrder->requisition_type }}</td>
                                            <td>Category: {{ $purchaseOrder->requisitionCategory->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Supervisor: {{ $purchaseOrder->worker->name }}</td>
                                            <td colspan="3">Description: {{ $purchaseOrder->description }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Task Info -->
        </div>
    </div>
@endsection
@push('js')
    <script>
        function printDiv(divName)
        {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endpush
