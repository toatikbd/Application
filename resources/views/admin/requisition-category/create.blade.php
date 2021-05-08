@extends('layouts.app')
@section('title', 'Requisition Category')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>All Requisition Category <span class="badge bg-blue"></span></h2>
        <ol class="breadcrumb breadcrumb-col-pink breadcrumb-right-align">
            <li><a href="{{ url('/home') }}"><i class="material-icons">home</i> Dashboard</a></li>
            <li><a href="{{ route('procurement.index') }}"><i class="material-icons">gesture</i> Procurement</a></li>
            <li class="active"><i class="material-icons">archive</i>Requisition Category</li>
        </ol>
    </div>
    <div class="row clearfix">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="body">
                        <form action="{{ route('requisition-category.store') }}" method="POST">
                            @csrf
                            <label for="country_name">Requisition Category Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="country_name" name="name" autocomplete="off" class="form-control" placeholder="Country Name">
                                </div>
                            </div>
                            <label for="note">Note</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" id="note" name="note" autocomplete="off" class="form-control no-resize" placeholder="Note"></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg m-t-15 waves-effect">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- #END# Vertical Layout -->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>All Requisition Category <span class="badge bg-blue">{{ $requisitionCategories->count() }}</span></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Note</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requisitionCategories as $key => $category)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ Str::limit($category->name, 25) }}</td>
                                            <td>{{ Str::limit($category->note, 15) }}</td>
                                            <td class="text-right">
                                                <form action="{{ route('requisition-category.destroy',$category->id) }}" method="POST">
                                                    <a href="{{ route('requisition-category.edit', $category->id) }}" class="btn btn-warning btn-xs waves-effect">
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
