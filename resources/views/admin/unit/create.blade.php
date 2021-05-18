@extends('layouts.app')
@section('title', 'Unit')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>All Unit <span class="badge bg-blue"></span></h2>
        <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
            <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
            <li><a href="{{ route('procurement.index') }}"><i class="material-icons">gesture</i> Procurement</a></li>
            <li class="active"><i class="material-icons">archive</i>Units</li>
        </ol>
    </div>
    <div class="row clearfix">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="body">
                        <form action="{{ route('unit.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="unit_name">Unit Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="unit_name" name="name" autocomplete="off" class="form-control" placeholder="Unit Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="unit_symbol">Unit Symbol</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="unit_symbol" name="symbol" autocomplete="off" class="form-control" placeholder="Unit Symbol">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="unit_qty">Quantity Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="unit_qty" name="qty_name" autocomplete="off" class="form-control" placeholder="Unit QTY">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg m-t-15 waves-effect">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- #END# Vertical Layout -->
                <div class="card">
                    <div class="header">
                        <code>Notes</code>
                        <span>Basic Example Units</span>
                    </div>
                    <div class="card-body">
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Unit Name</th>
                                        <th>Unit Symbol</th>
                                        <th>Quantity Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>metre</td>
                                        <td>m</td>
                                        <td>length</td>
                                    </tr>
                                    <tr>
                                        <td>kilogram</td>
                                        <td>kg</td>
                                        <td>mass</td>
                                    </tr>
                                    <tr>
                                        <td>ampere</td>
                                        <td>A</td>
                                        <td>electric current</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>All Unit <span class="badge bg-blue">{{ $units->count() }}</span></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Unit Name</th>
                                        <th>Unit Symbol</th>
                                        <th>Quantity Name</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($units as $key => $unit)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ Str::limit($unit->name, 10) }}</td>
                                            <td>{{ Str::limit($unit->symbol, 15) }}</td>
                                            <td>{{ Str::limit($unit->qty_name, 15) }}</td>
                                            <td class="text-right">

                                                <form action="{{ route('unit.destroy',$unit->id) }}" method="POST">
                                                    <a href="{{ route('unit.edit', $unit->id) }}" class="btn btn-warning btn-xs waves-effect">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn  btn-xs btn-danger waves-effect" type="submit">
                                                      <i class="material-icons">delete</i>
                                                    </button>

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
