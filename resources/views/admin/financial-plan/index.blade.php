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
            @foreach ($projects as $key => $project)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <ul class="list-group">
                        <li class="list-group-item text-center bg-blue">{{ $project->name }}</li>
                        <li class="list-group-item">Estimate Amount <span class="badge bg-green">20</span></li>
                        <li class="list-group-item">Purchase Amount <span class="badge bg-pink">15</span></li>
                        <li class="list-group-item">Expense Amount <span class="badge bg-pink">20</span></li>
                        <li class="list-group-item">Balance Amount <span class="badge bg-teal">99</span></li>
                        <a href="#">
                            <li class="text-center bg-blue">View Details</li>
                        </a>
                    </ul>
                </div>
            @endforeach
        </div>
        <!-- #END# Widgets -->
    </div>
@endsection
@push('js')
    <script></script>
@endpush
