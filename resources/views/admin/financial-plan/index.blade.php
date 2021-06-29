@extends('layouts.app')
@section('title', 'Financial Plan')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Financial Plan <span class="badge bg-blue"></span></h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li class="active"><i class="material-icons">archive</i> Financial Plan</li>
            </ol>
        </div>
        <!-- Widgets -->
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Purchase Order</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered dashboard-task-infos table-striped dataTable js-basic-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Purchase No</th>
                                    <th>For Project</th>
                                    <th>QTY</th>
                                    <th>Total Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($purchaseOrders as $key => $order)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ Str::limit($order->title, 15) }}</td>
                                            <td>{{ $order->po_no }}</td>
                                            <td>{{ $order->project->name }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ $order->total_price }}</td>
                                        </tr>
                                    @empty
                                        <tr class="text-center text-danger">
                                            <td colspan="6">Date Not Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-right">Grand Total Amount</th>
{{--                                        <th>{{ $purchaseOrders->count() }}</th>--}}
                                        <th>{{$order->sum('total_price')}}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->
    </div>
@endsection
@push('js')
    <script></script>
@endpush
