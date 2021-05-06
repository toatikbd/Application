@extends('layouts.app')
@section('title', 'Site Evaluation')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Site Evaluation</h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li><a href="{{ route('preliminary-work.index') }}"><i class="material-icons">library_books</i> Preliminary Work</a></li>
                <li><a href="{{ route('site-evaluation.index') }}"><i class="material-icons">library_books</i> Site Evaluation</a></li>
                <li class="active"><i class="material-icons">archive</i> View Evaluation</li>
            </ol>
        </div>
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Task Details <span class="badge bg-green">{{ ($siteEvaluation->task_title) }}</span></h2>
                        <a href="{{ route('site-evaluation.index') }}" class="btn btn-success waves-effect right-align-task-btn">
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
                                                    <th scope="row">Task Title</th>
                                                    <td>{{ ($siteEvaluation->task_title) }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Task Description</th>
                                                    <td>{{ ($siteEvaluation->task_description) }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Progress</th>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $siteEvaluation->task_progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $siteEvaluation->task_progress }}%"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">File</th>
                                                    <td>
                                                        <img class="img-responsive thumbnail" width="50" height="auto" src="{{ asset('files/'.$siteEvaluation->file) }}" alt="{{ $siteEvaluation->task_title }}">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-hover table-bordered dashboard-task-infos">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Task Status</th>
                                                    <td>
                                                        @if($siteEvaluation->status == true)
                                                            <span class="badge bg-blue">The End</span>
                                                        @else
                                                            <span class="badge bg-pink">Doing</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Project Name</th>
                                                    <td>{{ $siteEvaluation->project->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Supervisor</th>
                                                    <td>{{ $siteEvaluation->worker->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Start Date</th>
                                                    <td>{{ \Carbon\Carbon::parse($siteEvaluation->start_date)->format('d/m/Y')}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">End Date</th>
                                                    <td>{{ \Carbon\Carbon::parse($siteEvaluation->end_date)->format('d/m/Y')}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Day Total</th>
                                                    <td>
                                                        <span class="label bg-red">{{ \App\Classes\DayCount::days( $siteEvaluation->start_date, $siteEvaluation->end_date) }} Days</span>
                                                    </td>
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
