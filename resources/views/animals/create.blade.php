@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="w-100 max-w-4xl">
            <h1 class="h3 font-weight-bold mb-4 text-center">Add Animal</h1>
            <div class="mt-4">
                @auth
                <form action="{{ route('animals.store') }}" method="POST" class="p-5 border border-secondary rounded shadow-sm mb-4">
                    @csrf
                    <div class="form-group">
                        <label for="name"><strong>Name of the animal:</strong></label>
                        <input type="text" name="name" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="species"><strong>Species:</strong></label>
                        <input type="text" name="species"  required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="age"><strong>Age:</strong></label>
                        <input type="number" name="age" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description"><strong>Description:</strong></label>
                        <textarea name="description" required class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="cage_id"><strong>Cage:</strong></label>
                        <select name="cage_id" required class="form-control">
                            @foreach ($cages as $cage)
                                <option value="{{ $cage->id }}">{{ $cage->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-danger btn-sm">Add Animal</button>
                    </div>

                </form>
                @endauth
            </div>
        </div>
    </div>
@endsection