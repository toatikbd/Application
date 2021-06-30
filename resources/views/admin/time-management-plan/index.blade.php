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
            <!-- Preliminary Work -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Preliminary Work</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered dashboard-task-infos table-striped dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th width="40">#</th>
                                    <th width="200">Project Name</th>
                                    <th>Progress<span class="badge bg-pink">%</span></th>
                                    <th class="text-center" width="100">Total Time</th>
                                    <th class="text-right" width="50">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $key => $project)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $project->name }}</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
                                                </div>
                                            </td>
                                            <td class="text-center">20 day</td>
                                            <td class="text-right">
                                                <a href="{{ route('project.show', $project->id) }}" class="btn btn-primary btn-xs waves-effect">
                                                    <i class="material-icons">visibility</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Design and Drawing -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Design and Drawing</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered dashboard-task-infos table-striped dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th width="40">#</th>
                                    <th width="200">Project Name</th>
                                    <th>Progress<span class="badge bg-pink">%</span></th>
                                    <th class="text-center" width="100">Total Time</th>
                                    <th class="text-right" width="50">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($siteEvaluations as $key => $siteEvaluation)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ Str::limit($siteEvaluation->task_title, 10) }}</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $siteEvaluation->task_progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $siteEvaluation->task_progress }}%"></div>
                                            </div>
                                        </td>
{{--                                        <td class="text-center">30</td>--}}
                                        <td>
                                            <span class="label bg-red">{{ \App\Classes\DayCount::days( $siteEvaluation->start_date, $siteEvaluation->end_date) }} Days</span>
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('project.show', $project->id) }}" class="btn btn-primary btn-xs waves-effect">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Documentation -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Documentation</h2>
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
