@extends('layouts.app')
@section('title', 'Contractor')
@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('admin') }}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <style>
        .bootstrap-select .bs-searchbox .form-control, .bootstrap-select .bs-actionsbox .form-control, .bootstrap-select .bs-donebutton .form-control {
            margin-left: 1px!important;
            padding-left: 35px!important;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Contractor</h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li class="active"><i class="material-icons">archive</i> Contractor</li>
            </ol>
        </div>

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>TASK INFOS</h2>
                        <a href="{{ route('contractor.index') }}" class="btn btn-success waves-effect right-align-task-btn">
                            <i class="material-icons">visibility</i>
                            <span>View All Tasks</span>
                        </a>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong> Whoops!</strong> There were some problems with your input<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <form action="{{ route('contractor.update', $contractor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="body">
                            <label for="name">Full Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="name" name="name" value="{{ $contractor->name }}" class="form-control" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="mobile">Mobile Number</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="mobile" name="mobile" value="{{ $contractor->mobile }}" class="form-control" placeholder="01789898989">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="task_file">Email Address</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" id="email" name="email" value="{{ $contractor->email }}" class="form-control" placeholder="xyz@gmail.com">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="address">Address</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="address" name="address" value="{{ $contractor->address }}" class="form-control" placeholder="Home address">
                                </div>
                            </div>
                            <label for="experience">Experience</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea id="experience" name="experience" cols="30" rows="5" class="form-control no-resize" aria-required="true">{{ $contractor->experience }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body">
                            <label for="photo">Photo</label>
                            <div class="form-group">
                                <div>
                                    <input type="file" id="photo" name="photo" class="btn btn-primary btn-lg waves-effect" onchange="previewFiles()"/>
                                    <div class="preview"></div>
                                    <img src="{{ asset('contractors/'.$contractor->photo) }}" alt="{{ $contractor->name }}" style="max-width:130px; margin-top: 20px">
                                </div>
                            </div>
                            <label for="select_worker">Select Project</label>
                            <div class="form-group {{ $errors->has('projects') ? 'focused error' : '' }}">
                                <div class="form-line custom-live-search">
                                    <select class="form-control show-tick" id="select_worker" name="project_id" data-live-search="true">
                                        <option selected disabled>-- Please select project--</option>
                                        @foreach($projects as $key => $project)
                                            <option {{ $project->id == $contractor->project_id ? 'selected' : '' }} value="{{ $project->id }}"> {{ $project->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('contractor.index') }}" class="btn btn-danger waves-effect">
                                    <i class="material-icons">settings_backup_restore</i>
                                    <span>BACK</span>
                                </a>
                                <button type="submit"  class="btn btn-success waves-effect">
                                    <i class="material-icons">save</i>
                                    <span>SAVE</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- #END# Task Info -->
        </div>
    </div>
@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('admin') }}/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script>


    </script>
@endpush

