@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="w-100" style="max-width: 800px;">
        <h1 class="h3 font-weight-bold mb-4 text-center">List Animal</h1>
        <div class="mb-4 text-center">
            <a href="{{ route('animals.create')}}" class="btn btn-success"></a>
        </div>
        <div class="mt-4">
            @foreach ($animals as $animal )
            <div class="p-3 border border-secondary rounded shadow-sm mb-4"></div>
            <h2 class="h5 font-weight-semibold">{{ $animal->name }}</h2>
            <p><strong>Species: </strong> {{$animal->species }}</p>
            <p><strong>Age: </strong> {{$animal->age }}</p>
            <p><strong>Description: </strong> {{$animal->description }}</p>

            @endforeach
        </div>
    </div>
</div>
    <h1>List animals</h1>
    <a href="{{route('animals.create')}}">Add new beast</a>
    @foreach ($animals as $animal)
        <h2>{{ $animal->name }}</h2>
        <p><strong>Species:</strong>{{ $animal->species }}</p>
        <p><strong>Age:</strong>{{ $animal->age }}</p>
        <p><strong>Description:</strong>{{ $animal->description }}</p>
        <a href="{{ route('animals.show', $animal) }}">Watch</a>
        @auth
            <a href="{{ route('animals.edit', $animal) }}">Edit</a>
            <form action="{{ route('animals.destroy', $animal) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endauth
    @endforeach
@endsection