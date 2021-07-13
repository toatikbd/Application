@extends('layouts.app')
@section('title', 'Mobilization')
@push('css')
    <style>
        .mobilization{
            width: 100%;
            height: 400px;
            border: 1px solid rgba(0,0,0,.2);
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Mobilization</h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li><a href="{{ route('preliminary-work.index') }}"><i class="material-icons">library_books</i> Preliminary Work</a></li>
                <li><a href="{{ route('mobilization.index') }}"><i class="material-icons">library_books</i> Mobilization</a></li>
                <li class="active"><i class="material-icons">archive</i> View Mobilization</li>
            </ol>
        </div>
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Task Details <span class="badge bg-green">{{ ($mobilization->task_title) }}</span></h2>
                        <a href="{{ route('mobilization.index') }}" class="btn btn-success waves-effect right-align-task-btn">
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
                                                    <td>{{ ($mobilization->task_title) }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Task Description</th>
                                                    <td>{{ ($mobilization->task_description) }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Progress</th>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-green"
                                                                 role="progressbar"
                                                                 aria-valuenow="{{ $mobilization->task_progress }}"
                                                                 aria-valuemin="0" aria-valuemax="100"
                                                                 style="width: {{ $mobilization->task_progress }}%">
                                                                {{ $mobilization->task_progress }}%
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">File</th>
                                                    <td>
                                                        <div class="mobilization"></div>
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
                                                        @if($mobilization->status == true)
                                                            <span class="badge bg-blue">The End</span>
                                                        @else
                                                            <span class="badge bg-pink">Doing</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Project Name</th>
                                                    <td>{{ $mobilization->project->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Supervisor</th>
                                                    <td>{{ $mobilization->worker->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Start Date</th>
                                                    <td>{{ \Carbon\Carbon::parse($mobilization->start_date)->format('d/m/Y')}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">End Date</th>
                                                    <td>{{ \Carbon\Carbon::parse($mobilization->end_date)->format('d/m/Y')}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Day Total</th>
                                                    <td>
                                                        <span class="label bg-red">{{ \App\Classes\DayCount::days( $mobilization->start_date, $mobilization->end_date) }} Days</span>
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
    <script type="text/javascript">
        var viewer = $(".mobilization");
        PDFObject.embed("{{ asset('mobilization-file/'.$mobilization->file) }}", viewer);
    </script>
@endpush
