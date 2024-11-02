@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="w-100 max-w-4xl">
            <h1 class="h5 font-weight-semibold">{{ $animal->name }}</h1>
            <div class="mt-4">
                <div class="p-5 border border-secondary rounded shadow-sm mb-4">
                    <p><strong>Species:</strong> {{ $animal->species }}</p>
                    <p><strong>Age:</strong> {{ $animal->age }}</p>
                    <p><strong>Description:</strong> {{ $animal->description }}</p>
                    <div class="mt-2">
                        <a href="{{ route('animals.index') }}" class="text-orange-600 hover:underline" >Go back</a>
                    </div>
                    <form action="{{ route('animals.destroy', $animal) }}" method="POST" class="d-inline ml-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                    <a href="{{ route('animals.edit', $animal) }}" class="ml-3 text-warning" >Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection