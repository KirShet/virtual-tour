@extends('layouts.app')

@section('content')
    <h1>Main page</h1>

    @foreach ($cages as $cage)
        <div class="card mb-4">
            <h2>{{ $cage->name }}</h2>
            <p>Capacity: {{ $cage->capacity }}</p>
            <p>Current number of animals: {{ $cage->animals->count() }}</p>

            @if($cage->animals->isEmpty())
                <p>No animals in this cage.</p>
            @else
                <ul>
                    @foreach ($cage->animals as $animal)
                        <li>{{ $animal->name }} - {{ $animal->species }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endforeach
@endsection