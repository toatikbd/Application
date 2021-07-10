@extends('layouts.app')
@section('title', 'Time Management Plan')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Time Management Plan
                <i class="material-icons">access_alarm</i>
                <span class="badge bg-blue"></span>
            </h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li class="active"><i class="material-icons">archive</i> Time Management Plan</li>
            </ol>
        </div>
        <!-- Widgets -->
        <div class="row clearfix">
            <!-- Badges -->

            @foreach ($projects as $key => $project)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <ul class="list-group">
                    <li class="list-group-item text-center bg-blue">{{ $project->name }}</li>
                    <li class="list-group-item">Approximate Time <span class="badge bg-green">20</span></li>
                    <li class="list-group-item">Leave Time <span class="badge bg-pink">15</span></li>
                    <li class="list-group-item">Total Task <span class="badge bg-teal">99</span></li>
                    <li class="list-group-item">Done Task <span class="badge bg-orange">21</span></li>
                    <li class="list-group-item">
                        <div class="progress">
                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                        </div>
                    </li>
                    <a href="#">
                        <li class="text-center bg-blue">View Details</li>
                    </a>
                </ul>
                </div>
            @endforeach

        </div>
        <!-- #END# Widgets -->
    </div>
@endsection
@push('js')
    <script>

    </script>
@endpush
