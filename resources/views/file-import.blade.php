@extends('layouts.app')


@section('content')
    <div class="container mt-5 text-center">
        <h2 class="mb-4">
            Import and Export CSV & Excel to Database
        </h2>

        <form action="{{ route('file.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-file col-5 offset-3 mb-3">
                <input type="file" name="file" class="form-file-input" id="customFile">
                <label class="form-file-label" for="customFile">
                    <span class="form-file-text">Choose file...</span>
                    <span class="form-file-button">Browse</span>
                </label>
            </div>
            <button class="btn btn-primary">Import data</button>
            <a class="btn btn-success" href="{{ route('file.export') }}">Export data</a>
        </form>
    </div>
@endsection
