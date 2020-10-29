@extends('layouts.app')

@section('content')
    <div class="container">
        @include('common.errors')
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <h5 class="card-header">New Task</h5>
                    <div class="card-body">
                        <form action="{{ route('tasks.store') }}" method="POST" class="row">
                            @csrf
                            <div class="col">
                                <label for="task" class="visually-hidden"></label>
                                <input type="text" name="name" class="form-control" id="task" placeholder="Added new task">
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary mb-3">+ Add New Task</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-5">
                @forelse($tasks as $task)
                <div class="card  text-body mb-3 @if($task->status) bg-warning @endif">
                    <div class="card-header d-flex justify-content-between">
                        @if($task->status)
                            <h6>Task <span class="badge bg-secondary">New</span></h6>
                        @else
                            <h6>Task <span class="badge bg-success">Completed</span></h6>
                        @endif
                        Was created: {{ date($task->created_at) }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            @if($task->status)
                                {{ $task->name }}
                                <a href="{{ route('tasks.show', $task->id) }}"><i class="fas fa-eye text-secondary ml-3"></i></a>
                                <a href="{{ route('tasks.edit', $task->id) }}"><i class="fas fa-edit text-secondary ml-1"></i></a>
                            @else
                                <strike>{{$task->name}}</strike>
                            @endif
                        </h5>
                        <p><strong class="text-truncate">Created by:</strong> {{Auth::user()->name}}</p>
                        <div class="d-flex justify-content-between">
                            <form action="{{route('tasks.update', $task->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input name="status" type="hidden" value="0">
                                <button class="btn btn-primary" {{ $task->status ?: 'disabled' }}>Change status</button>
                            </form>

{{--                                <form method="POST" action="{{ route('tasks.first', $task) }}" class="mr-1">--}}
{{--                                    @csrf--}}
{{--                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-up"></span></button>--}}
{{--                                </form>--}}
{{--                                <form method="POST" action="{{ route('tasks.up', $task) }}" class="mr-1">--}}
{{--                                    @csrf--}}
{{--                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-up"></span></button>--}}
{{--                                </form>--}}
{{--                                <form method="POST" action="{{ route('tasks.down', $task) }}" class="mr-1">--}}
{{--                                    @csrf--}}
{{--                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-down"></span></button>--}}
{{--                                </form>--}}
{{--                                <form method="POST" action="{{ route('tasks.last', $task) }}" class="mr-1">--}}
{{--                                    @csrf--}}
{{--                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-down"></span></button>--}}
{{--                                </form>--}}

                            <form action="{{route('tasks.destroy', $task->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                    No Tasks
                @endforelse
            </div>
        </div>
    </div>
@endsection
