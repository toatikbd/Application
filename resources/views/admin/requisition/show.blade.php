@extends('layouts.app')
@section('title', 'Requisition')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Requisition</h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li><a href="{{ route('procurement.index') }}"><i class="material-icons">library_books</i> Procurement</a></li>
                <li><a href="{{ route('requisition.index') }}"><i class="material-icons">library_books</i> Requisition</a></li>
                <li class="active"><i class="material-icons">archive</i> View Requisition</li>
            </ol>
        </div>
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Requisition Details <span class="badge bg-green">{{ ($requisition->title) }}</span></h2>
                        <a href="{{ route('requisition.index') }}" class="btn btn-success waves-effect right-align-task-btn">
                            <i class="material-icons">visibility</i>
                            <span>View All</span>
                        </a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>
                                        <table class="table table-hover table-bordered dashboard-task-infos">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Title</th>
                                                    <td>{{ ($requisition->title) }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Category</th>
                                                    <td>{{ $requisition->requisitionCategory->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Requisition Type</th>
                                                    <td>{{ $requisition->requisition_type }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Manufacturer</th>
                                                    <td>{{ $requisition->manufacturer }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Country of Origin</th>
                                                    <td>{{ $requisition->requisitionCountry->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Description</th>
                                                    <td>{{ $requisition->description }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-hover table-bordered dashboard-task-infos">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Status</th>
                                                    <td>
                                                        @if($requisition->approved_by == true)
                                                            <span class="badge bg-blue">Approved</span>
                                                        @else
                                                            <span class="badge bg-pink">Unapproved</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Product Price</th>
                                                    <td>{{ $requisition->price }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Product Quantity</th>
                                                    <td>{{ $requisition->quantity }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Unit Type</th>
                                                    <td>{{ $requisition->unit->symbol }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Needed Date</th>
                                                    <td>{{ \Carbon\Carbon::parse($requisition->needed_date)->format('d/m/Y')}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Project Name</th>
                                                    <td>{{ $requisition->project->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Supervisor</th>
                                                    <td>{{ $requisition->worker->name }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
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

@endpush
