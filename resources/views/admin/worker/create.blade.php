@extends('layouts.app')
@section('title', 'Supervisor')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Site Supervisor</h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li><a href="{{ route('worker.index') }}"><i class="material-icons">library_books</i>All Supervisor</a></li>
                <li class="active"><i class="material-icons">archive</i> Add Supervisor</li>
            </ol>
        </div>

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Supervisor</h2>
                        <a href="{{ route('worker.index') }}" class="btn btn-success waves-effect right-align-task-btn">
                            <i class="material-icons">visibility</i>
                            <span>View All Supervisor</span>
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
                @if(Session::has('success'))
                    <div class="alert alert success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
            </div>

            <form action="{{ route('worker.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="body">
                            <label for="name">Full Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="name" name="name" autocomplete="off" class="form-control" placeholder="Enter Full Name">
                                </div>
                            </div>
                            <label for="email">E-mail Address</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="email" id="email" name="email" autocomplete="off" class="form-control" placeholder="Enter email">
                                </div>
                            </div>
                            <label for="mobile">Mobile Number</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="mobile" name="mobile" autocomplete="off" class="form-control" placeholder="Enter Mobile Number">
                                </div>
                            </div>
                            <label for="job_title">Job Title</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="job_title" name="job_title" autocomplete="off" class="form-control" placeholder="Job Title">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body">
                            <label for="department_name">Department Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="department_name" name="department" class="form-control" placeholder="Department Name">
                                </div>
                            </div>
                            <label for="photo_upload">Photo Upload</label>
                            <div class="form-group">
                                <div>
                                    <input id="photo_upload" type="file" name="image" class="btn btn-primary btn-lg waves-effect" onchange="previewFiles()">
                                    <div class="preview"></div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('worker.index') }}" class="btn btn-danger m-t-15 waves-effect">
                                    <i class="material-icons">settings_backup_restore</i>
                                    <span>BACK</span>
                                </a>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">
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
    <script type="text/javascript">

    </script>
@endpush
