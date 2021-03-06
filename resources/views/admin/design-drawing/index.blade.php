@extends('layouts.app')
@section('title', 'Design and Drawing')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Design and Drawing <span class="badge bg-blue"></span></h2>
        </div>
        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('architectural-drawing.index') }}" class="text-dec-none">
                    <div class="info-box bg-pink hover-expand-effect cursor-pointer">
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
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('structural-design.index') }}" class="text-dec-none">
                    <div class="info-box bg-cyan hover-expand-effect cursor-pointer">
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
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('interior-detail.index') }}" class="text-dec-none">
                    <div class="info-box bg-blue hover-expand-effect cursor-pointer">
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
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('m-e-p.index') }}" class="text-dec-none">
                    <div class="info-box bg-blue-grey hover-expand-effect cursor-pointer">
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
        <!-- #END# Widgets -->
    </div>

@endsection

@push('js')

@endpush
