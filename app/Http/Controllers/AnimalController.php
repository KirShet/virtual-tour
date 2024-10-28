<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAnimalRequest;

class AnimalController extends Controller
{
    $validatedData = $request->validated();
    $cage = Cage::findDrFail($request->cage-id);

    if(!$cage->hasSpace()) {
        return redirect()->back()->withErrors(['cage_id' => 'There is no free space in the selected cell.']);
    }

    $animal = new Animal($validatedData);
    $cage->animal()->save($animal);

    return redirect()->route('animals.index')->with('succes', 'The beast was added succes')

}
