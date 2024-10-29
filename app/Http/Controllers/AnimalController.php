<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAnimalRequest;
use App\Models\Animal;
use App\Models\Cage;

class AnimalController extends Controller
{
    public function create()
    {
        return view('animal.create');
    }

    public function store(StoreAnimalRequest $request)
    {
        $validatedData = $request->validated();
        $cage = Cage::findOrFail($validatedData['cage_id']);

        if(!$cage->hasSpace()) {
            return redirect()->back()->withErrors(['cage_id' => 'There is no free space in the selected cell.']);
        }

        $animal = new Animal($validatedData);
        $cage->animals()->save($animal);

        return redirect()->route('animals.index')->with('success', 'The beast was added succes');
    }

    public function show(Animal $animal)
    {
        return view('animal.show', compact('animal'));
    }

    public function edit(Animal $animal)
    {
        return view('animals.edit', compact('animal'));
    }
}
