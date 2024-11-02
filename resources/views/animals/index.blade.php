@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="w-100 max-w-4xl">
            <h1 class="h3 font-weight-bold mb-4 text-center">List Animal</h1>
            <div class="mb-4 text-center">
                <a href="{{ route('animals.create') }}" class="btn btn-dark">Added new animals</a>
            </div>
            <div class="mt-4">
                @foreach ($animals as $animal)
                    <div class="p-5 border border-secondary rounded shadow-sm mb-4">
                        <h class="h5 font-weight-semibold">{{ $animal->name }}</h>
                        <p><strong>Species:</strong> {{ $animal->species }}</p>
                        <p><strong>Age:</strong> {{ $animal->age }}</p>
                        <p><strong>Description:</strong> {{ $animal->description }}</p>
                        <div class="mt-2">
                            <a href="{{ route('animals.show', $animal) }}" class="text-orange-600 hover:underline">Show</a>
                            @auth
                                <a href="{{ route('animals.edit', $animal) }}" class="ml-3 text-warning">Edit</a>
                                <form action="{{ route('animals.destroy', $animal) }}" method="post" class="d-inline ml-3">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            @endauth
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>
@endsection