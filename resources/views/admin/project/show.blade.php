@extends('layouts.app')
@section('title', 'Project')
@push('css')
    <style>
        .site-valuation, .mobilization{
            width: 100%;
            height: 400px;
            border: 1px solid rgba(0,0,0,.2);
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Project</h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li class="active"><i class="material-icons">archive</i> View Projects</li>
            </ol>
        </div>
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Project Basic Information:: <span class="badge bg-green">{{ ($project->name) }}</span></h2>
                        <a href="{{ route('project.index') }}" class="btn btn-success waves-effect right-align-task-btn">
                            <i class="material-icons">visibility</i>
                            <span>View All</span>
                        </a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered dashboard-task-infos">
                                <tbody>
                                    <tr>
                                        <th scope="row">Project Name</th>
                                        <td>{{ ($project->name) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Project Owner</th>
                                        <td>{{ ($project->owner) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Location</th>
                                        <td>{{ ($project->location) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Crated Time and Date</th>
                                        <td>{{ ($project->created_at) }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Task Info -->
        </div>
        <div class="row clearfix">
            <!-- Preliminary Work Panel Items -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Preliminary Work
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-col-pink">
                                        <div class="panel-heading" role="tab" id="headingOne_17">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseOne_17" aria-expanded="true" aria-controls="collapseOne_17">
                                                    <i class="material-icons">perm_contact_calendar</i> Site Evaluation
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne_17" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_17">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    @forelse($project->siteEvaluations as $siteEvaluation)
                                                        <table class="table table-hover table-bordered dashboard-task-infos">
                                                            <tbody>
                                                            <tr>
                                                                <th scope="row">TaskTitle</th>
                                                                <td>{{ ($siteEvaluation->task_title) }}</td>
                                                                <th scope="row">Task Status</th>
                                                                <td>
                                                                    @if($siteEvaluation->status == true)
                                                                        <span class="badge bg-blue">The End</span>
                                                                    @else
                                                                        <span class="badge bg-pink">Doing</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Description</th>
                                                                <td>{{ ($siteEvaluation->task_description) }}</td>
                                                                <th scope="row">Supervisor</th>
                                                                <td>{{ $siteEvaluation->worker->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Progress</th>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $siteEvaluation->task_progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $siteEvaluation->task_progress }}%"></div>
                                                                    </div>
                                                                </td>
                                                                <th scope="row">Start Date</th>
                                                                <td>{{ \Carbon\Carbon::parse($siteEvaluation->start_date)->format('d/m/Y')}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Attachment File</th>
                                                                <td>
                                                                    <button type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-light waves-float" data-toggle="modal" data-target="#siteEvaluation">
                                                                        <i class="material-icons">attachment</i>
                                                                    </button>
                                                                </td>
                                                                <th scope="row">End Date</th>
                                                                <td>{{ \Carbon\Carbon::parse($siteEvaluation->end_date)->format('d/m/Y')}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" colspan="2"></th>
                                                                <th scope="row">Day Total</th>
                                                                <td>
                                                                    <span class="label bg-red">{{ \App\Classes\DayCount::days( $siteEvaluation->start_date, $siteEvaluation->end_date) }} Days</span>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                            <!-- Modal Dialogs ======== -->
                                                            <!-- Default Size -->
                                                            <div class="modal fade" id="siteEvaluation" tabindex="-1" role="dialog">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <button class="btn bg-blue btn-circle waves-effect waves-circle waves-light waves-float modal-close-btn-init" data-dismiss="modal"><i class="material-icons">cancel</i></button>
                                                                            <div class="site-valuation"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </table>
                                                    @empty
                                                        <p class="text-center text-danger">No Site Evaluation Date Found</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="headingTwo_17">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseTwo_17" aria-expanded="false"
                                                   aria-controls="collapseTwo_17">
                                                    <i class="material-icons">cloud_download</i> Mobilization
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo_17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_17">
                                            <div class="panel-body">

                                                <div class="table-responsive">
                                                    @foreach($project->mobilizations as $mobilization)
                                                    <table class="table table-hover table-bordered dashboard-task-infos">

                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Title</th>
                                                                <td>{{$mobilization->task_title}}</td>
                                                                <th scope="row">Task Status</th>
                                                                <td>
                                                                    @if($mobilization->status == true)
                                                                        <span class="badge bg-blue">The End</span>
                                                                    @else
                                                                        <span class="badge bg-pink">Doing</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Description</th>
                                                                <td>{{$mobilization->task_description}}</td>
                                                                <th scope="row">Supervisor</th>
                                                                <td>{{ $mobilization->worker->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Progress</th>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $mobilization->task_progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $mobilization->task_progress }}%"></div>
                                                                    </div>
                                                                </td>
                                                                <th scope="row">Start Date</th>
                                                                <td>{{ \Carbon\Carbon::parse($mobilization->start_date)->format('d/m/Y')}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Attached File</th>
                                                                <td>
                                                                    <button type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-light waves-float" data-toggle="modal" data-target="#mobilization">
                                                                        <i class="material-icons">attachment</i>
                                                                    </button>
                                                                </td>
                                                                <th scope="row">End Date</th>
                                                                <td>{{ \Carbon\Carbon::parse($mobilization->end_date)->format('d/m/Y')}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" colspan="2"></th>
                                                                <th scope="row">Day Total</th>
                                                                <td>
                                                                    <span class="label bg-red">{{ \App\Classes\DayCount::days( $mobilization->start_date, $mobilization->end_date) }} Days</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>

                                                        <!-- Modal Dialogs ======== -->
                                                        <!-- Default Size -->
                                                        <div class="modal fade" id="mobilization" tabindex="-1" role="dialog">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <button class="btn bg-blue btn-circle waves-effect waves-circle waves-light waves-float modal-close-btn-init" data-dismiss="modal"><i class="material-icons">cancel</i></button>
                                                                        <div class="mobilization"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </table>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-col-teal">
                                        <div class="panel-heading" role="tab" id="headingThree_17">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseThree_17" aria-expanded="false"
                                                   aria-controls="collapseThree_17">
                                                    <i class="material-icons">contact_phone</i> Site Clearance
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree_17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_17">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    @forelse($project->siteClearances as $siteClearance)
                                                        <table class="table table-hover table-bordered dashboard-task-infos">
                                                            <tbody>
                                                            <tr>
                                                                <th scope="row">TaskTitle</th>
                                                                <td>{{ ($siteClearance->task_title) }}</td>
                                                                <th scope="row">Task Status</th>
                                                                <td>
                                                                    @if($siteClearance->status == true)
                                                                        <span class="badge bg-blue">The End</span>
                                                                    @else
                                                                        <span class="badge bg-pink">Doing</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Description</th>
                                                                <td>{{ ($siteClearance->task_description) }}</td>
                                                                <th scope="row">Supervisor</th>
                                                                <td>{{ $siteClearance->worker->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Progress</th>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $siteClearance->task_progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $siteClearance->task_progress }}%"></div>
                                                                    </div>
                                                                </td>
                                                                <th scope="row">Start Date</th>
                                                                <td>{{ \Carbon\Carbon::parse($siteClearance->start_date)->format('d/m/Y')}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Attachment File</th>
                                                                <td>
                                                                    <button type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-light waves-float" data-toggle="modal" data-target="#siteClearance">
                                                                        <i class="material-icons">attachment</i>
                                                                    </button>
                                                                </td>
                                                                <th scope="row">End Date</th>
                                                                <td>{{ \Carbon\Carbon::parse($siteClearance->end_date)->format('d/m/Y')}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" colspan="2"></th>
                                                                <th scope="row">Day Total</th>
                                                                <td>
                                                                    <span class="label bg-red">{{ \App\Classes\DayCount::days( $siteClearance->start_date, $siteClearance->end_date) }} Days</span>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                            <!-- Modal Dialogs ======== -->
                                                            <!-- Default Size -->
                                                            <div class="modal fade" id="siteClearance" tabindex="-1" role="dialog">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <button class="btn bg-blue btn-circle waves-effect waves-circle waves-light waves-float modal-close-btn-init" data-dismiss="modal"><i class="material-icons">cancel</i></button>
                                                                            Lorem ipsum
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </table>
                                                    @empty
                                                        <p class="text-center text-danger">Site Clearance Date Not Found</p>
                                                    @endforelse

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Preliminary Work Panel Items -->
        </div>
        <div class="row clearfix">
            <!-- Design and Drawing Panel Items -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Design and Drawing
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                <div class="panel-group" id="accordion_18" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-col-pink">
                                        <div class="panel-heading" role="tab" id="headingOne_18">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_18" href="#collapseOne_18" aria-expanded="false">
                                                    <i class="material-icons">perm_contact_calendar</i> Architectural Drawing
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne_18" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne_18">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    @forelse($project->architecturalDrawings as $architecturalDrawing)
                                                        <table class="table table-hover table-bordered dashboard-task-infos">
                                                            <tbody>
                                                            <tr>
                                                                <th scope="row">TaskTitle</th>
                                                                <td>{{ ($architecturalDrawing->task_title) }}</td>
                                                                <th scope="row">Task Status</th>
                                                                <td>
                                                                    @if($architecturalDrawing->status == true)
                                                                        <span class="badge bg-blue">The End</span>
                                                                    @else
                                                                        <span class="badge bg-pink">Doing</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Description</th>
                                                                <td>{{ ($architecturalDrawing->task_description) }}</td>
                                                                <th scope="row">Supervisor</th>
                                                                <td>{{ $architecturalDrawing->worker->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Progress</th>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $architecturalDrawing->task_progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $architecturalDrawing->task_progress }}%"></div>
                                                                    </div>
                                                                </td>
                                                                <th scope="row">Start Date</th>
                                                                <td>{{ \Carbon\Carbon::parse($architecturalDrawing->start_date)->format('d/m/Y')}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Attachment File</th>
                                                                <td>
                                                                    <button type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-light waves-float" data-toggle="modal" data-target="#architecturalDrawing">
                                                                        <i class="material-icons">attachment</i>
                                                                    </button>
                                                                </td>
                                                                <th scope="row">End Date</th>
                                                                <td>{{ \Carbon\Carbon::parse($architecturalDrawing->end_date)->format('d/m/Y')}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" colspan="2"></th>
                                                                <th scope="row">Day Total</th>
                                                                <td>
                                                                    <span class="label bg-red">{{ \App\Classes\DayCount::days( $architecturalDrawing->start_date, $architecturalDrawing->end_date) }} Days</span>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                            <!-- Modal Dialogs ======== -->
                                                            <!-- Default Size -->
                                                            <div class="modal fade" id="architecturalDrawing" tabindex="-1" role="dialog">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <button class="btn bg-blue btn-circle waves-effect waves-circle waves-light waves-float modal-close-btn-init" data-dismiss="modal"><i class="material-icons">cancel</i></button>
                                                                            Lorem ipsum
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </table>
                                                    @empty
                                                        <p class="text-center text-danger">Architectural Drawing Date not Found</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="headingTwo_18">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_18" href="#collapseTwo_18" aria-expanded="false"
                                                   aria-controls="collapseTwo_18">
                                                    <i class="material-icons">cloud_download</i> Structural Design
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo_18" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_18">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    @forelse($project->structuralDesigns as $structuralDesign)
                                                        <table class="table table-hover table-bordered dashboard-task-infos">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">Title</th>
                                                                    <td>{{$structuralDesign->task_title}}</td>
                                                                    <th scope="row">Task Status</th>
                                                                    <td>
                                                                        @if($structuralDesign->status == true)
                                                                            <span class="badge bg-blue">The End</span>
                                                                        @else
                                                                            <span class="badge bg-pink">Doing</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Description</th>
                                                                    <td>{{$structuralDesign->task_description}}</td>
                                                                    <th scope="row">Supervisor</th>
                                                                    <td>{{ $structuralDesign->worker->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Progress</th>
                                                                    <td>
                                                                        <div class="progress">
                                                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $structuralDesign->task_progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $structuralDesign->task_progress }}%"></div>
                                                                        </div>
                                                                    </td>
                                                                    <th scope="row">Start Date</th>
                                                                    <td>{{ \Carbon\Carbon::parse($structuralDesign->start_date)->format('d/m/Y')}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Attached File</th>
                                                                    <td>
                                                                        <button type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-light waves-float" data-toggle="modal" data-target="#structuralDesign">
                                                                            <i class="material-icons">attachment</i>
                                                                        </button>
                                                                    </td>
                                                                    <th scope="row">End Date</th>
                                                                    <td>{{ \Carbon\Carbon::parse($structuralDesign->end_date)->format('d/m/Y')}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" colspan="2"></th>
                                                                    <th scope="row">Day Total</th>
                                                                    <td>
                                                                        <span class="label bg-red">{{ \App\Classes\DayCount::days( $structuralDesign->start_date, $structuralDesign->end_date) }} Days</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>

                                                            <!-- Modal Dialogs ======== -->
                                                            <!-- Default Size -->
                                                            <div class="modal fade" id="structuralDesign" tabindex="-1" role="dialog">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <button class="btn bg-blue btn-circle waves-effect waves-circle waves-light waves-float modal-close-btn-init" data-dismiss="modal"><i class="material-icons">cancel</i></button>
                                                                            Lorem ipsum
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </table>
                                                    @empty
                                                        <p class="text-center text-danger">Structural Design Date Not Found</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-col-teal">
                                        <div class="panel-heading" role="tab" id="headingThree_18">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_18" href="#collapseThree_18" aria-expanded="false"
                                                   aria-controls="collapseThree_18">
                                                    <i class="material-icons">contact_phone</i> Interior Full Details
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree_18" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_18">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    @forelse($project->interiorDetails as $interiorDetail)
                                                        <table class="table table-hover table-bordered dashboard-task-infos">
                                                            <tbody>
                                                            <tr>
                                                                <th scope="row">TaskTitle</th>
                                                                <td>{{ ($interiorDetail->task_title) }}</td>
                                                                <th scope="row">Task Status</th>
                                                                <td>
                                                                    @if($interiorDetail->status == true)
                                                                        <span class="badge bg-blue">The End</span>
                                                                    @else
                                                                        <span class="badge bg-pink">Doing</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Description</th>
                                                                <td>{{ ($interiorDetail->task_description) }}</td>
                                                                <th scope="row">Supervisor</th>
                                                                <td>{{ $interiorDetail->worker->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Progress</th>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $interiorDetail->task_progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $interiorDetail->task_progress }}%"></div>
                                                                    </div>
                                                                </td>
                                                                <th scope="row">Start Date</th>
                                                                <td>{{ \Carbon\Carbon::parse($interiorDetail->start_date)->format('d/m/Y')}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Attachment File</th>
                                                                <td>
                                                                    <button type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-light waves-float" data-toggle="modal" data-target="#interiorDetails">
                                                                        <i class="material-icons">attachment</i>
                                                                    </button>
                                                                </td>
                                                                <th scope="row">End Date</th>
                                                                <td>{{ \Carbon\Carbon::parse($interiorDetail->end_date)->format('d/m/Y')}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" colspan="2"></th>
                                                                <th scope="row">Day Total</th>
                                                                <td>
                                                                    <span class="label bg-red">{{ \App\Classes\DayCount::days( $interiorDetail->start_date, $interiorDetail->end_date) }} Days</span>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                            <!-- Modal Dialogs ======== -->
                                                            <!-- Default Size -->
                                                            <div class="modal fade" id="interiorDetails" tabindex="-1" role="dialog">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <button class="btn bg-blue btn-circle waves-effect waves-circle waves-light waves-float modal-close-btn-init" data-dismiss="modal"><i class="material-icons">cancel</i></button>
                                                                            Lorem ipsum
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </table>
                                                    @empty
                                                        <p class="text-center text-danger">Interior Detail Date Not Found</p>
                                                    @endforelse

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Design and Drawing Panel Items -->
        </div>
        <div class="row clearfix">
            <!-- Documentation Panel Items -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Documentation
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                <div class="panel-group" id="accordion_19" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-col-pink">
                                        <div class="panel-heading" role="tab" id="headingOne_19">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_19" href="#collapseOne_19" aria-expanded="false">
                                                    <i class="material-icons">perm_contact_calendar</i> Documentation
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne_19">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    @forelse($project->documentations as $documentation)
                                                        <table class="table table-hover table-bordered dashboard-task-infos">
                                                            <tbody>
                                                            <tr>
                                                                <th scope="row">TaskTitle</th>
                                                                <td>{{ ($documentation->task_title) }}</td>
                                                                <th scope="row">Task Status</th>
                                                                <td>
                                                                    @if($documentation->status == true)
                                                                        <span class="badge bg-blue">The End</span>
                                                                    @else
                                                                        <span class="badge bg-pink">Doing</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Description</th>
                                                                <td>{{ ($documentation->task_description) }}</td>
                                                                <th scope="row">Supervisor</th>
                                                                <td>{{ $documentation->worker->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Progress</th>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $documentation->task_progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $documentation->task_progress }}%"></div>
                                                                    </div>
                                                                </td>
                                                                <th scope="row">Start Date</th>
                                                                <td>{{ \Carbon\Carbon::parse($documentation->start_date)->format('d/m/Y')}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Attachment File</th>
                                                                <td>
                                                                    <button type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-light waves-float" data-toggle="modal" data-target="#documentation">
                                                                        <i class="material-icons">attachment</i>
                                                                    </button>
                                                                </td>
                                                                <th scope="row">End Date</th>
                                                                <td>{{ \Carbon\Carbon::parse($documentation->end_date)->format('d/m/Y')}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" colspan="2"></th>
                                                                <th scope="row">Day Total</th>
                                                                <td>
                                                                    <span class="label bg-red">{{ \App\Classes\DayCount::days( $documentation->start_date, $documentation->end_date) }} Days</span>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                            <!-- Modal Dialogs ======== -->
                                                            <!-- Default Size -->
                                                            <div class="modal fade" id="documentation" tabindex="-1" role="dialog">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <button class="btn bg-blue btn-circle waves-effect waves-circle waves-light waves-float modal-close-btn-init" data-dismiss="modal"><i class="material-icons">cancel</i></button>
                                                                            Lorem ipsum
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </table>
                                                    @empty
                                                        <p class="text-center text-danger">Documentation Date not Found</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Documentation Panel Items -->
        </div>
        <div class="row clearfix">
            <!-- Contractor Panel Items -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Contractor
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                <div class="panel-group" id="accordion_20" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-col-pink">
                                        <div class="panel-heading" role="tab" id="headingOne_20">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_20" href="#collapseOne_20" aria-expanded="false">
                                                    <i class="material-icons">perm_contact_calendar</i> Contractor
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne_20" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne_20">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    @forelse($project->contractors as $contractor)
                                                        <table class="table table-hover table-bordered dashboard-task-infos">
                                                            <tbody>
                                                            <tr>
                                                                <th scope="row">Contractor Name</th>
                                                                <td>{{ ($contractor->name) }}</td>
                                                                <td rowspan="3">
                                                                    <h5>Contractor Photo</h5>
                                                                    <img src="{{ asset('contractors/'.$contractor->photo) }}" alt="{{ $contractor->name }}" width="120px" height="auto">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Email Address</th>
                                                                <td>{{ ($contractor->email) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Mobile Number</th>
                                                                <td>{{ $contractor->mobile }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Address</th>
                                                                <td colspan="2">{{ $contractor->address }}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    @empty
                                                        <p class="text-center text-danger">Contractor Date not Found</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Contractor Panel Items -->
        </div>
        <div class="row clearfix">
            <!-- Procurement Panel Items -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Procurement
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                <div class="panel-group" id="accordion_21" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-col-pink">
                                        <div class="panel-heading" role="tab" id="headingOne_21">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_21" href="#collapseOne_21" aria-expanded="false">
                                                    <i class="material-icons">perm_contact_calendar</i> Requisition
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne_21" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne_21">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    @forelse($project->requisitions as $requisition)
                                                        <table class="table table-hover table-bordered dashboard-task-infos">
                                                            <tbody>
                                                            <tr>
                                                                <th scope="row">Title</th>
                                                                <td>{{ ($requisition->title) }}</td>
                                                                <th scope="row">Status</th>
                                                                <td>
                                                                    @if($requisition->approved_by == true)
                                                                        <span class="badge bg-blue">Approved</span>
                                                                    @else
                                                                        <span class="badge bg-pink">Unapproved</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Requisition Number</th>
                                                                <td>{{ ($requisition->requisition_no) }}</td>
                                                                <th scope="row">Product Price</th>
                                                                <td>{{ $requisition->price }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Category</th>
                                                                <td>{{ $requisition->requisitionCategory->name }}</td>
                                                                <th scope="row">Product Quantity</th>
                                                                <td>{{ $requisition->quantity }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Requisition Type</th>
                                                                <td>{{ $requisition->requisition_type }}</td>
                                                                <th scope="row">Unit Type</th>
                                                                <td>{{ optional($requisition->unit)->symbol }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Manufacturer</th>
                                                                <td>{{ $requisition->manufacturer }}</td>
                                                                <th scope="row">Needed Date</th>
                                                                <td>{{ \Carbon\Carbon::parse($requisition->needed_date)->format('d/m/Y')}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Country of Origin</th>
                                                                <td>{{ $requisition->requisitionCountry->name }}</td>
                                                                <th scope="row">Project Name</th>
                                                                <td>{{ $requisition->project->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Description</th>
                                                                <td>{{ $requisition->description }}</td>
                                                                <th scope="row">Supervisor</th>
                                                                <td>{{ $requisition->worker->name }}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    @empty
                                                        <p class="text-center text-danger">Requisition Date not Found</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="headingTwo_22">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_22" href="#collapseTwo_22" aria-expanded="false"
                                                   aria-controls="collapseTwo_22">
                                                    <i class="material-icons">cloud_download</i> Purchase Order
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo_22" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_22">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    @forelse($project->requisitions as $requisition)
                                                        <table class="table table-hover table-bordered dashboard-task-infos">
                                                            <tbody>
                                                            <tr>
                                                                <th scope="row">Title</th>
                                                                <td>{{ ($requisition->title) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Requisition Number</th>
                                                                <td>{{ ($requisition->requisition_no) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Category</th>
                                                                <td>{{ $requisition->requisitionCategory->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Requisition Type</th>
                                                                <td>{{ $requisition->requisition_type }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Manufacturer</th>
                                                                <td>{{ $requisition->manufacturer }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Country of Origin</th>
                                                                <td>{{ $requisition->requisitionCountry->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Description</th>
                                                                <td>{{ $requisition->description }}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    @empty
                                                        <p class="text-center text-danger">Purchase Order Date Not Found</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Procurement Panel Items -->
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        var viewer = $(".site-valuation");
        // var viewer = $(".mobilization");
        PDFObject.embed("{{ asset('site-evaluation-file/'.$siteEvaluation->file) }}", viewer);
        {{--PDFObject.embed("{{ asset('files/'.$mobilization->file) }}", viewer);--}}
    </script>
@endpush
