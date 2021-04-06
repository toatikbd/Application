@extends('layouts.app')
@section('title', 'Supervisor')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Site Supervisor</h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li><a href="{{ route('worker.index') }}"><i class="material-icons">library_books</i>Site Supervisor</a></li>
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
            </div>
            <form action="{{ route('worker.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="body">
                            <label for="name">Full Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter Full Name">
                                </div>
                            </div>
                            <label for="job_title">Job Title</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="job_title" name="job_title" class="form-control" placeholder="Job Title">
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
                                    <div id="preview"></div>
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
        function previewFiles() {

            var preview = document.querySelector('#preview');
            var files   = document.querySelector('input[type=file]').files;

            function readAndPreview(file) {

                // Make sure `file.name` matches our extensions criteria
                if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
                    var reader = new FileReader();

                    reader.addEventListener("load", function () {
                        var image = new Image();
                        image.height = 100;
                        image.title = file.name;
                        image.src = this.result;
                        preview.appendChild( image );
                    }, false);

                    reader.readAsDataURL(file);
                }

            }

            if (files) {
                [].forEach.call(files, readAndPreview);
            }

        }
    </script>
@endpush
