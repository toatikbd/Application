@extends('layouts.app')
@section('title', 'Unit')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>All Unit <span class="badge bg-blue">00</span></h2>
        </div>
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <a href="{{ route('unit.create') }}" class="text-dec-none btn btn-primary">Back to Create</a>
            </div>
            <!-- #END# Task Info -->
        </div>
    </div>
@endsection
@push('js')

@endpush
