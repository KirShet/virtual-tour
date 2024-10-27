@extends('layouts.app')

@section('content')
    <h1>Cage</h1>
    <a href="{{ route('cage.create') }}" class="btn btn-primary">Add cage</a>
    @if(session("success"))
        <div class="alert alert-success">{{ session('success')}}</div>
    @endif
    @foreach ($cages as $cage)
        <div>
            <h2>{{ $cage->name }}</h2>
            <p>Capacity: {{$cage->capacity}} </p>
            <a href="{{ route('cages.show', $cage) }}" class="btn btn-info">Watch</a>
            <a href="{{ route('cages.edit', $cage) }}" class="btn btn-warning"> Edit</a>
            <form action="{{ route('cages.destroy', $cage) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    @endforeach
@endsection