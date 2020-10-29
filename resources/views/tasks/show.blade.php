@extends('layouts.app')

@section('content')
    <div class="container">
        @include('common.errors')
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="col-4">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Task Status:</th>
                    <th scope="col">{{ $task->status ? 'new' : 'completed' }}</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Date created:</th>
                    <td>{{ date($task->created_at) }}</td>
                </tr>
                <tr>
                    <th scope="row">Task title:</th>
                    <td>{{ $task->name }}</td>
                </tr>
                <tr>
                    <th scope="row">User name:</th>
                    <td colspan="2">{{ Auth::user()->name }}</td>
                </tr>
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{ route('tasks.index') }}">Back task list</a>
        </div>
    </div>

@endsection
