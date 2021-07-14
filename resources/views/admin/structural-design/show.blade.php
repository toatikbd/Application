@extends('layouts.app')
@section('title', 'Structural Design')
@push('css')
    <style>
        #viewpdf{
            width: 100%;
            height: 400px;
            border: 1px solid rgba(0,0,0,.2);
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Structural Design</h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li><a href="{{ route('design-drawing.index') }}"><i class="material-icons">library_books</i> Design and Drawing</a></li>
                <li><a href="{{ route('structural-design.index') }}"><i class="material-icons">library_books</i> Structural Design</a></li>
                <li class="active"><i class="material-icons">archive</i> View Structural Design</li>
            </ol>
        </div>
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Task Details <span class="badge bg-green">{{ ($structuralDesign->task_title) }}</span></h2>
                        <a href="{{ route('structural-design.index') }}" class="btn btn-success waves-effect right-align-task-btn">
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
                                                    <td>{{ ($structuralDesign->task_title) }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Task Description</th>
                                                    <td>{{ ($structuralDesign->task_description) }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Progress</th>
                                                    <td>
                                                        <div class="progress height-20">
                                                            <div class="progress-bar bg-green"
                                                                 role="progressbar"
                                                                 aria-valuenow="{{ $structuralDesign->task_progress }}"
                                                                 aria-valuemin="0" aria-valuemax="100"
                                                                 style="width: {{ $structuralDesign->task_progress }}%">
                                                                {{ $structuralDesign->task_progress }}%
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">File</th>
                                                    <td>
                                                        <div id="viewpdf"></div>
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
                                                        @if($structuralDesign->status == true)
                                                            <span class="badge bg-blue">The End</span>
                                                        @else
                                                            <span class="badge bg-pink">Doing</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Project Name</th>
                                                    <td>{{ $structuralDesign->project->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Supervisor</th>
                                                    <td>{{ $structuralDesign->worker->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Start Date</th>
                                                    <td>{{ \Carbon\Carbon::parse($structuralDesign->start_date)->format('d/m/Y')}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">End Date</th>
                                                    <td>{{ \Carbon\Carbon::parse($structuralDesign->end_date)->format('d/m/Y')}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Day Total</th>
                                                    <td>
                                                        <span class="label bg-red">{{ \App\Classes\DayCount::days( $structuralDesign->start_date, $structuralDesign->end_date) }} Days</span>
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
        var viewer = $("#viewpdf");
        PDFObject.embed("{{ asset('structural-design-file/'.$structuralDesign->file) }}", viewer);
    </script>
@endpush
