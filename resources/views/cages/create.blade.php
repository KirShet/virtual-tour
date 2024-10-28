@extends('layouts.app')

@section('content')
    <h1>Add cage</h1>
    <form action="{{ route('cages.store')}}" method="post">
        @csrf
        <label for="name">Name of the cell:</label>
        <input type="text" name="name" required>

        <label for="capacity">Capacity: </label>
        <input type="number" name="capacity" required>

        <button type="submit">Add Cage</button>
    </form>
@endsection