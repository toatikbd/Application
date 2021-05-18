@extends('layouts.app')
@section('title', 'Edit Unit')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2 class="text-center">Edit Unit</h2>
        </div>
        <div class="row clearfix">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form action="{{ route('unit.update', $unit->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <label for="name">Unit Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" value="{{ $unit->name }}" class="form-control">
                                    </div>
                                </div>
                                <label for="note">Note</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" id="note" name="note" class="form-control text-left no-resize">
                                            {{ $unit->note }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('unit.create') }}" class="btn btn-danger m-t-15 waves-effect">BACK</a>
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- #END# Vertical Layout -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
