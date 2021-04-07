@extends('layouts.app')
@section('title', 'Project')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>All Projects <span class="badge bg-blue"></span></h2>
        </div>
        <div class="row clearfix">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="project_title">Project Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="project_title" name="name" class="form-control" placeholder="Enter your Project Title">
                                    </div>
                                </div>
                                <label for="project_description">Project Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" id="project_description" name="description" class="form-control no-resize" placeholder="Please type your Project description in shorthand"></textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg m-t-15 waves-effect">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- #END# Vertical Layout -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>All Project <span class="badge bg-blue">{{ $projects->count() }}</span></h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $key => $project)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ Str::limit($project->name, 10) }}</td>
                                                <td>{{ Str::limit($project->description, 15) }}</td>
                                                <td class="text-right">

                                                    <form action="{{ route('project.destroy',$project->id) }}" method="POST">
                                                        <a href="{{ route('project.edit', $project->id) }}" class="btn btn-warning btn-xs waves-effect">
                                                            <i class="material-icons">edit</i>
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn  btn-xs btn-danger waves-effect" type="submit">
                                                          <i class="material-icons">delete</i>
                                                        </button>

                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection

    @push('js')

    @endpush