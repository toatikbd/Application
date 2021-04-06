@extends('layouts.app')
@section('title', 'All Supervisor')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>All Supervisor <span class="badge bg-blue">23</span></h2>
        </div>
        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Supervisor infos</h2>
                        <a href="{{ route('worker.create') }}" class="btn btn-success waves-effect right-align-task-btn">
                            <i class="material-icons">add</i>
                            <span>Create New</span>
                        </a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Job Title</th>
                                        <th>Department</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workers as $key => $worker)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ Str::limit($worker->name, 10) }}</td>
                                            <td>
                                                <img class="img-responsive thumbnail" width="50" height="auto" src="{{ asset('images/'.$worker->image) }}" alt="{{ $worker->name }}">
{{--                                                <img class="img-responsive thumbnail" width="50" height="auto" src="{{ url('storage/worker/'. $worker->image)  }}" alt="{{ $worker->name }}">--}}
                                            </td>
                                            <td>{{ Str::limit($worker->job_title, 10) }}</td>
                                            <td>{{ Str::limit($worker->department, 10) }}</td>
                                            <td class="text-right">
                                                <form action="{{ route('worker.destroy',$worker->id) }}" method="POST">
                                                    <a href="{{ route('worker.edit', $worker->id) }}" class="btn btn-warning btn-xs waves-effect">
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
            <!-- #END# Task Info -->
        </div>
    </div>

@endsection

@push('js')

@endpush
