@extends('layouts.app')
@section('title', 'Project')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>All Projects <span class="badge bg-blue">{{ $projects->count() }}</span></h2>
        </div>
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Project</h2>
                        <a href="{{ route('project.create') }}" class="btn btn-success waves-effect right-align-task-btn">
                            <i class="material-icons">add</i>
                            <span>Create a Project</span>
                        </a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Owner Name</th>
                                    <th>Location</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $key => $project)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ Str::limit($project->name, 10) }}</td>
                                            <td>{{$project->owner}}</td>
                                            <td>{{$project->location}}</td>
                                            <td class="text-right">
                                                <form action="{{ route('project.destroy',$project->id) }}" method="POST">
                                                    <a href="{{ route('project.show', $project->id) }}" class="btn btn-primary btn-xs waves-effect">
                                                        <i class="material-icons">visibility</i>
                                                    </a>
                                                    <a href="{{ route('project.edit', $project->id) }}" class="btn btn-warning btn-xs waves-effect">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                {{--                                                        @csrf--}}
                                                {{--                                                        @method('DELETE')--}}
                                                {{--                                                        <button class="btn  btn-xs btn-danger waves-effect" type="submit">--}}
                                                {{--                                                          <i class="material-icons">delete</i>--}}
                                                {{--                                                        </button>--}}
                                                {{--                                                        </form>--}}
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
