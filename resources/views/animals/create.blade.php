@extends('layouts.app')

@section('content')
    <h1>Add Animal</h1>
    <form action="{{ route('animals.store')}}" method="post">
        @csrf
        <label for="name">Name of the animal:</label>
        <input type="text" name="name" required>

        <label for="species">Species: </label>
        <input type="text" name="species" required>

        <label for="Age">Name of the animal:</label>
        <input type="number" name="age" required>

        <label for="description">Capacity: </label>
        <input type="text" name="description" required>

        <label for="cage_id">Select Cage:</label>
        <Select name="cage_id" required>
            <option value="">Select a cage</option>

                <option value=""></option>

        </Select>

        <button type="submit">Add Animal</button>
    </form>
@endsection