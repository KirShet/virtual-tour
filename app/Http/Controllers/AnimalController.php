<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimalRequest;
use App\Models\Animal;
use App\Models\Cage;

class AnimalController extends Controller
{
    public function create()
    {
        return view('animal.create');
    }

    public function store(AnimalRequest  $request)
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

    public function update(AnimalRequest $request, Animal $animal)
    {
        $validatedData = $request->validated();

        if ($animal->cage_id !== $validatedData['cage_id']){
            $newCage = Cage::findOrFail($validatedData['cage_id']);

            if (!$newCage->hasSpace()){
                return redirect()->back()->withErrors([ 'cage' => 'There is no free space in the selected cell.' ]);
            }
        }
        $animal->update($validatedData);
        return redirect()->route('animal.show', $animal)->with('success', 'The beast was added succes');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('animals.index')->with('success', 'The animal has been removed');
    }
}
