@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="w-100 max-w-4xl">
        <h1 class="h3 font-weight-bold mb-4 text-center">Edit cage</h1>
        <div class="mt-4">
        @auth
        <form action="{{ route('animals.update', $cage) }}" method="POST" class="p-5 border border-secondary rounded shadow-sm mb-4">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name"><strong>Name of the animal:</strong></label>
                <input type="text" name="name" value="{{ $cage->name }}" required class="form-control">
            </div>

            <div class="form-group">
                <label for="species"><strong>capacity:</strong></label>
                <input type="number" name="species" value="{{ $cage->capacity }}" required class="form-control">
            </div>
            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-danger btn-sm">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection