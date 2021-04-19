@extends('layouts.app')
@section('title', 'Interior Full Details')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
{{--            <h2>Interior Full Details <span class="badge bg-blue">{{ $structuralDesigns->count() }}</span></h2>--}}
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li><a href="{{ route('design-drawing.index') }}"><i class="material-icons">gesture</i> Design and Drawing</a></li>
                <li class="active"><i class="material-icons">archive</i>Interior Full Details</li>
            </ol>
        </div>
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>TASK INFOS</h2>
                        <a href="{{ route('interior-detail.create') }}" class="btn btn-success waves-effect right-align-task-btn">
                            <i class="material-icons">add_circle_outline</i>
                            <span>Create a Task</span>
                        </a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Task Title</th>
                                    <th>Progress<span class="badge bg-pink">%</span></th>
                                    <th>Supervisor</th>
                                    <th>Project Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Day Total</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($structuralDesigns as $key => $structuralDesign)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ Str::limit($structuralDesign->task_title, 10) }}</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $structuralDesign->task_progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $structuralDesign->task_progress }}%"></div>
                                        </div>
                                    </td>
                                    <td>{{ $structuralDesign->worker->name }}</td>
                                    <td>{{ $structuralDesign->project->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($structuralDesign->start_date)->format('d/m/Y')}}</td>
                                    <td>{{ \Carbon\Carbon::parse($structuralDesign->end_date)->format('d/m/Y')}}</td>
                                    <td>
                                        <span class="label bg-red">{{ \App\Classes\DayCount::days( $structuralDesign->start_date, $structuralDesign->end_date) }} Days</span>
                                    </td>
                                    <td>
                                        @if($structuralDesign->status == true)
                                            <span class="badge bg-blue">The End</span>
                                        @else
                                            <span class="badge bg-pink">Doing</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('structural-design.show', $structuralDesign->id) }}" class="btn btn-primary btn-xs waves-effect">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        <a href="{{ route('architectural-drawing.edit', $structuralDesign->id) }}" class="btn btn-warning btn-xs waves-effect">
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

@endpush
