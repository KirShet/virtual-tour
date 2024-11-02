@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="w-100 max-w-4xl">
        <h1 class="h5 font-weight-semibold">{{ $cage->name }}</h1>
        <p><strong>Capacity:</strong> {{ $cage->capacity }}</p>
            <div class="mt-2">
                <a href="{{ route('cages.index') }}" class="text-orange-600 hover:underline" >Go back</a>
                <form action="{{ route('cages.destroy', $cage) }}" method="POST" class="d-inline ml-3">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                </form>
            </div>
        </div>
    </div>
@endsection