@extends('layouts.app')

@section('content')
    <h1>Edit cage</h1>
    <form action="{{ route('cages.update', $cage) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $cage->name }}" required>

        <label for="capacity">capacity</label>
        <input type="number" name="capacity" value="{{ $cage->capacity }}" required>

        <button type="submit">Update</button>
    </form>
@endsection