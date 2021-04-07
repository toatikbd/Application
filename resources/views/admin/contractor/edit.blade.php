@extends('layouts.app')
@section('title', 'Edit Project')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2 class="text-center">Edit Projects</h2>
        </div>
        <div class="row clearfix">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form action="{{ route('project.update', $project->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <label for="project_title">Project Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="project_title" name="name" value="{{ $project->name }}" class="form-control" placeholder="Enter your Project Title">
                                    </div>
                                </div>
                                <label for="project_description">Project Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" id="project_description" name="description" class="form-control no-resize" placeholder="Please type your Project description in shorthand">
                                            {{ $project->description }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('project.create') }}" class="btn btn-danger m-t-15 waves-effect">BACK</a>
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- #END# Vertical Layout -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush