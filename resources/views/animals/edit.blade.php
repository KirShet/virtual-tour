@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="w-100 max-w-4xl">
        <h1 class="h3 font-weight-bold mb-4 text-center">Edit Animal</h1>
        <div class="mt-4">
            @auth
            <form action="{{ route('animals.update', $animal) }}" method="POST" class="p-5 border border-secondary rounded shadow-sm mb-4">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name"><strong>Name of the animal:</strong></label>
                    <input type="text" name="name" value="{{ $animal->name }}" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="species"><strong>Species:</strong></label>
                    <input type="text" name="species" value="{{ $animal->species }}" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="age"><strong>Age:</strong></label>
                    <input type="number" name="age" value="{{ $animal->age }}" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="description"><strong>Description:</strong></label>
                    <textarea name="description" required class="form-control">{{ $animal->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="cage_id"><strong>Cage ID:</strong></label>
                    <select name="cage_id" required class="form-control">
                        <option value="{{ $animal->cage_id }}">{{ current(array_filter($cages->toArray(), fn($cage) => $cage['id'] == $animal->cage_id))['name'] }}</option>
                        @foreach ($cages as $cage)
                            @if ($cage->id !== $animal->cage_id)
                                <option value="{{ $cage->id }}">{{ $cage->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                
                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-danger btn-sm">Update</button>
                </div>
            </form>
            @endauth
        </div>
    </div>
</div>
@endsection
