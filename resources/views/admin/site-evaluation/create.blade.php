@extends('layouts.app')
@section('title', 'Project')
@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('admin') }}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- noUISlider Css -->
    <link href="{{ asset('admin') }}/plugins/nouislider/nouislider.min.css" rel="stylesheet" />
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ asset('admin') }}/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <!-- Bootstrap DatePicker Css -->
    <link href="{{ asset('admin') }}/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
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
            <h2>Site Evaluation</h2>
            <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
                <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
                <li><a href="{{ route('preliminary-work.index') }}"><i class="material-icons">library_books</i> Preliminary Work</a></li>
                <li class="active"><i class="material-icons">archive</i> Site Evaluation</li>
            </ol>
        </div>

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>TASK INFOS</h2>
                        <a href="{{ route('site-evaluation.index') }}" class="btn btn-success waves-effect right-align-task-btn">
                            <i class="material-icons">visibility</i>
                            <span>View All Tasks</span>
                        </a>
                    </div>
                </div>
            </div>
            <form method="">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="body">
                            <label for="task_title">Task Title</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="task_title" class="form-control" placeholder="Enter Task Title">
                                </div>
                            </div>
                            <label for="task_description">Task Description</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="task_description" class="form-control" placeholder="Please type your Task description in shorthand">
                                </div>
                            </div>
                            <label for="task_description">Work Progress</label>
                            <div class="form-group">
                                <div id="nouislider_basic_example"></div>
                                <div class="m-t-20 font-12"><b>Value: </b><span class="js-nouislider-value"></span></div>
                            </div>
                            <label for="task_description">File Upload</label>
                            <div class="form-group">
                                <div>
                                    <input type="file" name="file" class="btn btn-primary btn-lg waves-effect" multiple />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body">
                            <label for="select_worker">Select Project</label>
                            <div class="form-group">
                                <div class="form-line custom-live-search">
                                    <select class="form-control show-tick" id="select_worker" data-live-search="true">
                                        <option value="">-- Please select --</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                            <label for="end_date">Date</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Date start...">
                                        </div>
                                        <span class="input-group-addon">to</span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Date end...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="select_worker">Select Worker</label>
                            <div class="form-group">
                                <div class="form-line custom-live-search">
                                    <select class="form-control show-tick" id="select_worker" data-live-search="true">
                                        <option value="">-- Please select --</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                            <label for="work_status">Work Status</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" id="work_status">
                                        <option value="">-- Please select --</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <!-- <a href="" class="btn btn-primary btn-lg m-t-15 waves-effect">Create</a> -->
                                <a href="site-evaluation.html" class="btn btn-success waves-effect">
                                    <i class="material-icons">save</i>
                                    <span>SAVE</span>
                                </a>
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
    <!-- noUISlider Plugin Js -->
    <script src="{{ asset('admin') }}/plugins/nouislider/nouislider.js"></script>
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{ asset('admin') }}/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="{{ asset('admin') }}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <script>
        //noUISlider
        var sliderBasic = document.getElementById('nouislider_basic_example');
        noUiSlider.create(sliderBasic, {
            start: [30],
            connect: 'lower',
            step: 1,
            range: {
                'min': [0],
                'max': [100]
            }
        });
        getNoUISliderValue(sliderBasic, true);
        //Get noUISlider Value and write on
        function getNoUISliderValue(slider, percentage) {
            slider.noUiSlider.on('update', function () {
                var val = slider.noUiSlider.get();
                if (percentage) {
                    val = parseInt(val);
                    val += '%';
                }
                $(slider).parent().find('span.js-nouislider-value').text(val);
            });
        }
        //end noUISlider
        // autosize($('textarea.auto-growth'));
        $('#bs_datepicker_range_container').datepicker({
            autoclose: true,
            container: '#bs_datepicker_range_container'
        });
    </script>
@endpush
