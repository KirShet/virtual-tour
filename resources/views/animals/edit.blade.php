@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
        <div class="w-100 max-w-4xl">
            <h1 class="h3 font-weight-bold mb-4 text-center">Edit animal</h1>
            @auth
            <form action="{{ route('animals.update', $animal) }}" method="POST"  class="d-inline ml-3">
        @csrf
        @method('PUT')
        <div class="p-5 border border-secondary rounded shadow-sm mb-4">
            <label for="name"><strong>Name of the animal:</strong></label>
            <input type="text" name="name" value="{{ $animal->name }}" required>

            <label for="species"><strong>Species: </strong></label>
            <input type="text" name="species" value="{{ $animal->species }}" required>

            <label for="Age"><strong>Age:</strong></label>
            <input type="number" name="age" value="{{ $animal->age }}" required>

            <label for="description"><strong>Description: </strong></label>
            <input type="text" name="description" value="{{ $animal->description }}" required>

            <label for="cage_id">Cage ID:</label>
        
        <select name="cage_id" required>
            <option value="{{ $animal->cage_id }}">{{current(array_filter($cages->toArray(), fn($cage) => $cage['id'] == $animal->cage_id))['name']}}</option>
            @foreach ($cages as $cage)
                @if ($cage->id !== $animal->cage_id)
                    <option value="{{ $cage->id }}">{{ $cage->name }}</option>
                @endif
            @endforeach
        </select>
        <button type="submit"  class="btn btn-danger btn-sm">Update</button>
    </form>
    @endauth
    </div>
@endsection