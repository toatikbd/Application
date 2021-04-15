@extends('layouts.app')
@section('title', 'Contractor List')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>All Contractor <span class="badge bg-blue">23</span></h2>
        </div>
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>TASK INFOS</h2>
                        <a href="{{ route('contractor.create') }}" class="btn btn-success waves-effect right-align-task-btn">
                            <i class="material-icons">add</i>
                            <span>Create a Contractor</span>
                        </a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Project</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($contractors as $key => $contractor)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ Str::limit($contractor->name, 10) }}</td>
                                        <td>{{ $contractor->mobile }}</td>
                                        <td>{{ $contractor->email }}</td>
                                        <td>{{ $contractor->mobile }}</td>
                                        <td>{{ $contractor->address }}</td>
                                        <td>{{ $contractor->project->name }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('contractor.show', $contractor->id) }}" class="btn btn-primary btn-xs waves-effect">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a href="{{ route('contractor.edit', $contractor->id) }}" class="btn btn-warning btn-xs waves-effect">
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
