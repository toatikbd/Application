@extends('layouts.app')
@section('title', 'Time Management Plan')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Time Management Plan
                <i class="material-icons">access_alarm</i>
                <span class="badge bg-blue"></span>
            </h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li class="active"><i class="material-icons">archive</i> Time Management Plan</li>
            </ol>
        </div>
        <!-- Widgets -->
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Preliminary Work</h2>
                    </div>
                    <div class="body">

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
