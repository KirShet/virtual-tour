@extends('layouts.app')

@section('content')
    <h1>List animals</h1>
    <a href="{{route('animals.create')}}">Add new beast</a>
    @foreach ($animals as $animal)
        <h2>{{ $animal->name }}</h2>
        <p><strong>Species:</strong>{{ $animal->species }}</p>
        <p><strong>Age:</strong>{{ $animal->age }}</p>
        <p><strong>Description:</strong>{{ $animal->description }}</p>
        @auth
            <a href="{{ route('animals.show', $animal) }}">Watch</a>
            <a href="{{ route('animals.edit', $animal) }}">Edit</a>
            <form action="{{ route('animals.destroy', $animal) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endauth
    @endforeach
@endsection