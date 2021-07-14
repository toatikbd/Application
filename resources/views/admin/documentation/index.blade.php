@extends('layouts.app')
@section('title', 'Documentation')
@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('admin') }}/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Documentation <span class="badge bg-blue">{{ $documentations->count() }}</span></h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li class="active"><i class="material-icons">archive</i> Documentation</li>
            </ol>
        </div>
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>TASK INFOS</h2>
                        <a href="{{ route('documentation.create') }}" class="btn btn-success waves-effect right-align-task-btn">
                            <i class="material-icons">add_circle_outline</i>
                            <span>Create a Task</span>
                        </a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered dashboard-task-infos table-striped dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Progress</th>
                                    <th>Supervisor</th>
                                    <th>Project</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Day Total</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($documentations as $key => $documentation)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ Str::limit($documentation->task_title, 10) }}</td>
                                    <td>
                                        <div class="progress height-20">
                                            <div class="progress-bar bg-green"
                                                 role="progressbar"
                                                 aria-valuenow="{{ $documentation->task_progress }}"
                                                 aria-valuemin="0" aria-valuemax="100"
                                                 style="width: {{ $documentation->task_progress }}%">
                                                {{ $documentation->task_progress }}%
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $documentation->worker->name }}</td>
                                    <td>{{ $documentation->project->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($documentation->start_date)->format('d/m/Y')}}</td>
                                    <td>{{ \Carbon\Carbon::parse($documentation->end_date)->format('d/m/Y')}}</td>
                                    <td>
                                        <span class="label bg-red">{{ \App\Classes\DayCount::days( $documentation->start_date, $documentation->end_date) }} Days</span>
                                    </td>
                                    <td>
                                        @if($documentation->status == true)
                                            <span class="badge bg-blue">The End</span>
                                        @else
                                            <span class="badge bg-pink">Doing</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('documentation.show', $documentation->id) }}" class="btn btn-primary btn-xs waves-effect">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        <a href="{{ route('documentation.edit', $documentation->id) }}" class="btn btn-warning btn-xs waves-effect">
                                            <i class="material-icons">edit</i>
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
            <!-- #END# Task Info -->
        </div>
    </div>

@endsection

@push('js')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('admin') }}/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="{{ asset('admin') }}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="{{ asset('admin') }}/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="{{ asset('admin') }}/js/pages/tables/jquery-datatable.js"></script>
@endpush
