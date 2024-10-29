<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAnimalRequest;

class AnimalController extends Controller
{
    public function create()
    {
        return view('animal.create');
    }

    public function store(StoreAnimalRequest $request){
        $validatedData = $request->validated();
        $cage = Cage::findDrFail($request->cage-id);

        if(!$cage->hasSpace()) {
            return redirect()->back()->withErrors(['cage_id' => 'There is no free space in the selected cell.']);
        }

        $animal = new Animal($validatedData);
        $cage->animal()->save($animal);

        return redirect()->route('animals.index')->with('succes', 'The beast was added succes')
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
