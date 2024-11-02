@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="w-100 max-w-4xl">
            <h1 class="h3 font-weight-bold mb-4 text-center">Add cage</h1>
            <div class="mt-4">
                @auth
                <form action="{{ route('cage.store') }}" method="POST" class="p-5 border border-secondary rounded shadow-sm mb-4">
                    @csrf
                    <div class="form-group">
                        <label for="name"><strong>Name of the cell:</strong></label>
                        <input type="text" name="name" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="species"><strong>Capacity:</strong></label>
                        <input type="number" name="capacity"  required class="form-control">
                    </div>
                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-danger btn-sm">Add Cage</button>
                    </div>
                </form>
                @endauth
            </div>
        </div>
    </div>
@endsection