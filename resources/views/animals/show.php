@extends('layouts.app')

@section('content')
        <h1>{{ $animal->name }}</h1>
        <p>Species: {{ $animal->species }}</p>
        <p>Age: {{ $animal->age }}</p>
        <p>Descriptions: {{ $animal->descriptions }}</p>
        <a href="{{ route('animals.index') }}">Go back</a>
        <form action="">
            @scrf
            @method('DELETE')
            <button type="submit">Удалить</button>
        </form>
        <a href="{{ route('animals.update') }}"></a>
@endsection