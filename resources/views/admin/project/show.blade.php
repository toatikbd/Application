@extends('layouts.app')
@section('title', 'Project')
@push('css')
    <style>
        /*#viewpdf{*/
        /*    width: 100%;*/
        /*    height: 400px;*/
        /*    border: 1px solid rgba(0,0,0,.2);*/
        /*}*/
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
            <!-- Colorful Panel Items With Icon -->
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
                                                                            Lorem ipsum
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
                                                                        Lorem ipsum
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
            <!-- #END# Colorful Panel Items With Icon -->
        </div>
    </div>
@endsection

@push('js')
{{--    <script src="{{ asset('admin') }}/js/pdfobject.min.js"></script>--}}
{{--    <script type="text/javascript">--}}
{{--        var viewer = $("#viewpdf");--}}
{{--        PDFObject.embed("{{ asset('documentation-file/'.$documentation->file) }}", viewer);--}}
{{--    </script>--}}
@endpush
