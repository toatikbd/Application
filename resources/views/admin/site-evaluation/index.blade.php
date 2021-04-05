@extends('layouts.app')
@section('title', 'Site Evaluation')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Site Evaluation <span class="badge bg-blue">23</span></h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li><a href="{{ route('preliminary-work.index') }}"><i class="material-icons">library_books</i> Preliminary Work</a></li>
                <li class="active"><i class="material-icons">archive</i> Site Evaluation</li>
            </ol>
        </div>
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>TASK INFOS</h2>
                        <a href="{{ route('site-evaluation.create') }}" class="btn btn-success waves-effect right-align-task-btn">
                            <i class="material-icons">add</i>
                            <span>Create a Task</span>
                        </a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Task</th>
                                    <th>Project</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>Worker</th>
                                    <th>Progress</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Undulating</td>
                                    <td>TZ XYZ</td>
                                    <td><span class="label bg-green">Doing</span></td>
                                    <td>26/03/1971</td>
                                    <td>John Doe</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <button type="button" class="btn btn-primary btn-xs waves-effect">
                                            <i class="material-icons">visibility</i>
                                        </button>
                                        <button type="button" class="btn btn-warning btn-xs waves-effect">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </td>
                                </tr>
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
