@extends('layouts.app')

@section('content')
    <h1>{{ $cage->name }}</h1>
    <p>Capacity: {{ $cage->capacity }}</p>
    <a href="{{ route('cages.index') }}">Go back</a>
@endsection