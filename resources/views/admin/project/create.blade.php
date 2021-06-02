@extends('layouts.app')
@section('title', 'Project')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>All Projects <span class="badge bg-blue"></span></h2>
{{--            @if ($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}
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
                                        <input type="text" id="project_title" name="name" autocomplete="off" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your Project Title">
                                    </div>
                                    @error('name')
                                    <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <label for="owner">Owner Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="owner" name="owner" autocomplete="off" class="form-control @error('owner') is-invalid @enderror" placeholder="Enter Project Owner Name">
                                    </div>
                                    @error('owner')
                                    <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <label for="location">Location</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="location" name="location" autocomplete="off" class="form-control @error('location') is-invalid @enderror" placeholder="Enter Project Location">
                                    </div>
                                    @error('location')
                                    <label class="error">{{ $message }}</label>
                                    @enderror
                                </div>
                                <label for="description">Project Description/ Note</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" id="description" name="description" autocomplete="off" class="form-control no-resize" placeholder="Please type your Project description in shorthand"></textarea>
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
                                            <th>Project Name</th>
                                            <th>Owner</th>
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
