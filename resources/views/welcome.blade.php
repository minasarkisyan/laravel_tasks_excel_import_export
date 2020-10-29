@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col text-center">
            <a class="btn btn-info btn-lg" href="{{ route('tasks.index') }}">Open tasks list</a>
            <a class="btn btn-info btn-lg" href="{{ route('file-import-export') }}">Open Excel import page</a>
        </div>
    </div>
@endsection
