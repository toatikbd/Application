@extends('layouts.app')
@section('title', 'Contractor Show')
@push('css')

@endpush
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>View Contractor Info</h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li class="active"><i class="material-icons">archive</i> Contractor Info</li>
            </ol>
        </div>

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>TASK INFOS</h2>
                        <a href="{{ route('contractor.index') }}" class="btn btn-success waves-effect right-align-task-btn">
                            <i class="material-icons">visibility</i>
                            <span>View All Tasks</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">
                            <img src="{{ asset('contractors/'.$contractor->photo) }}" alt="{{ $contractor->name }}" style="width: 128px; height: 128px">
                        </div>
                        <div class="content-area">
                            <h3>{{ $contractor->name }}</h3>
                            <p>Mobile: {{ $contractor->mobile }}</p>
                            <p>Email: {{ $contractor->email }}</p>
                            <p>Address: {{ $contractor->address }}</p>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <button class="btn btn-primary btn-lg waves-effect btn-block">Under Project: {{ $contractor->project->name }}</button>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="panel panel-default panel-post">
                        <div class="panel-heading">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="#">{{ $contractor->name }}</a>
                                    </h4>
                                    Shared publicly - 01 Oct 2018
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="post">
                                <div class="post-heading">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                                <div class="post-content">

                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">

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

