@extends('layouts.app')

@section('content')
    <div class="container">
        @include('common.errors')
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
    <div class="row mt-5">
        <div class="col-4">
            <div class="card-body">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="row g-3">
                    @csrf
                    @method('PATCH')
                    <div class="col-auto">
                        <label for="task" class="visually-hidden"></label>
                        <input type="text" name="name" class="form-control" id="task" value="{{ old('name', $task->name) }}">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Send</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection
