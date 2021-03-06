@extends('layouts.app')
@section('title', 'Preliminary Work')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Preliminary Work <span class="badge bg-blue"></span></h2>
        </div>
        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('site-evaluation.index') }}" class="text-dec-none">
                    <div class="info-box bg-pink hover-expand-effect cursor-pointer">
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
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('mobilization.index') }}" class="text-dec-none">
                    <div class="info-box bg-cyan hover-expand-effect cursor-pointer">
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
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('site-clearance.index') }}" class="text-dec-none">
                    <div class="info-box bg-blue hover-expand-effect cursor-pointer">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">Site Clearance </div>
                            <div class="number count-to" data-from="0" data-to="{{ $siteClearances }}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-blue-grey hover-expand-effect">
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
        <!-- #END# Widgets -->
    </div>

@endsection

@push('js')
    <script>

    </script>
@endpush
