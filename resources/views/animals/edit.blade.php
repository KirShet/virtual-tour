@extends('layouts.app')

@section('content')
    <h1>Edit animal</h1>
    <form action="{{ route('animals.update', $animal) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name of the animal:</label>
        <input type="text" name="name" value="{{ $animal->name }}" required>

        <label for="species">Species: </label>
        <input type="text" name="species" value="{{ $animal->species }}" required>

        <label for="Age">Age:</label>
        <input type="number" name="age" value="{{ $animal->age }}" required>

        <label for="description">description: </label>
        <input type="text" name="description" value="{{ $animal->description }}" required>

        <label for="cage_id">Cage ID:</label>
        <input type="number" name="cage_id" value="{{$animal->cage_id}}" required>

        <button type="submit">Update</button>
    </form>
@endsection