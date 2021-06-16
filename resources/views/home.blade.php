@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>{{ __('Dashboard') }}</h2>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        {{ __('You are logged in!') }}
    </div>

    <div class="row clearfix">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>All Project</h2>
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
                                    @forelse($projects as $key => $project)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ Str::limit($project->name, 15) }}</td>
                                            <td>{{ $project->owner }}</td>
                                            <td>{{ $project->location }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('project.show', $project->id) }}" class="btn btn-primary btn-xs waves-effect">
                                                    <i class="material-icons">visibility</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-danger">No Project Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Preliminary Works</h2>
                    </div>
                    <div class="body">
                        <!-- Widgets -->
                        <div class="row clearfix">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="{{ route('site-evaluation.index') }}" class="text-dec-none">
                                    <div class="info-box bg-pink hover-expand-effect cursor-pointer m-b-0-c">
                                        <div class="icon">
                                            <i class="material-icons">playlist_add_check</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Site Evaluation</div>
                                            <div class="number count-to" data-from="0" data-to="{{ $siteEvaluations }}" data-speed="15" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="{{ route('mobilization.index') }}" class="text-dec-none">
                                    <div class="info-box bg-cyan hover-expand-effect cursor-pointer m-b-0-c">
                                        <div class="icon">
                                            <i class="material-icons">help</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Mobilization</div>
                                            <div class="number count-to" data-from="0" data-to="{{ $mobilizations }}" data-speed="1000" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="{{ route('site-clearance.index') }}" class="text-dec-none">
                                    <div class="info-box bg-blue hover-expand-effect cursor-pointer m-b-0-c">
                                        <div class="icon">
                                            <i class="material-icons">forum</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Site Clearance</div>
                                            <div class="number count-to" data-from="0" data-to="{{ $siteClearances }}" data-speed="1000" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="info-box bg-blue-grey hover-expand-effect m-b-0-c">
                                    <div class="icon">
                                        <i class="material-icons">gps_fixed</i>
                                    </div>
                                    <div class="content">
                                        <div class="text">Upcoming</div>
                                        <div class="number count-to" data-from="0" data-to="0" data-speed="1000" data-fresh-interval="20"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- #END# Vertical Layout -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Design and Drawing</h2>
                    </div>
                    <div class="body">
                        <!-- Widgets -->
                        <div class="row clearfix">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="{{ route('architectural-drawing.index') }}" class="text-dec-none">
                                    <div class="info-box bg-pink hover-expand-effect cursor-pointer m-b-0-c">
                                        <div class="icon">
                                            <i class="material-icons">playlist_add_check</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Architectural Drawing</div>
                                            <div class="number count-to" data-from="0" data-to="{{ $architecturalDrawings }}" data-speed="15" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="{{ route('structural-design.index') }}" class="text-dec-none">
                                    <div class="info-box bg-cyan hover-expand-effect cursor-pointer m-b-0-c">
                                        <div class="icon">
                                            <i class="material-icons">help</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Structural Design</div>
                                            <div class="number count-to" data-from="0" data-to="{{ $structuralDesigns }}" data-speed="1000" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="{{ route('interior-detail.index') }}" class="text-dec-none">
                                    <div class="info-box bg-blue hover-expand-effect cursor-pointer m-b-0-c">
                                        <div class="icon">
                                            <i class="material-icons">forum</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Interior Full Details</div>
                                            <div class="number count-to" data-from="0" data-to="{{ $interiorDetails }}" data-speed="1000" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a href="{{ route('m-e-p.index') }}" class="text-dec-none">
                                    <div class="info-box bg-blue-grey hover-expand-effect cursor-pointer m-b-0-c">
                                        <div class="icon">
                                            <i class="material-icons">gps_fixed</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">MEP</div>
                                            <div class="number count-to" data-from="0" data-to="{{ $mEPs }}" data-speed="1000" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- #END# Vertical Layout -->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Documentation</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Document Title</th>
                                        <th>Project Name</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($documentations as $key => $documentation)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ Str::limit($documentation->task_title, 15) }}</td>
                                            <td>{{ !empty($documentation->project) ? $documentation->project->name:'' }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('documentation.show', $documentation->id) }}" class="btn btn-primary btn-xs waves-effect">
                                                    <i class="material-icons">visibility</i>
                                                </a>
                                                <a href="{{ route('documentation.edit', $documentation->id) }}" class="btn btn-warning btn-xs waves-effect">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-danger">No Documentation Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- #END# Vertical Layout -->
            </div>
        </div>
    </div>
</div>
@endsection
