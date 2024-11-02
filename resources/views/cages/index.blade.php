@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="w-100 max-w-4xl">
            <h1 class="h3 font-weight-bold mb-4 text-center">Cage</h1>
            <div class="mb-4 text-center">
                <a href="{{ route('cages.create') }}" class="btn btn-dark">Add cage</a>
                <div class="mt-4">
                @if(session("success"))
                    <div class="alert alert-success">{{ session('success')}}</div>
                @endif
                @foreach ($cages as $cage)
                    <div class="p-5 border border-secondary rounded shadow-sm mb-4">
                        <h2 class="h5 font-weight-semibold">{{ $cage->name }}</h2>
                        <p><strong>Species:</strong> {{$cage->capacity}} </p>
                        <p><strong>Age:</strong>{{ $cage->animals_count }}</p>
                        <div class="mt-2">
                            <a href="{{ route('cages.show', $cage) }}" class="text-orange-600 hover:underline">Show</a>
                            @auth
                            <a href="{{ route('cages.edit', $cage) }}" class="ml-3 text-warning">Edit</a>
                            <form action="{{ route('cages.destroy', $cage) }}" method="post" class="d-inline ml-3">
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
    </div>
@endsection