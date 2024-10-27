<?php

namespace App\Http\Controllers;

use App\Models\Cage;
use Illuminate\Http\Request;

class CageController extends Controller
{
    public function index()
    {
        $cages = Cage::all();
        return view('cages.index', compact('cages'));
    }

    public function create()
    {
        return view('cages.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' =>'required|string|max:255',
            'capacity' =>'required|integer|min:1',
        ]);

        Cage::create($validatedData);
        return redirect()->route('cages.index')->with('success', 'Cage created successfully.');
    }

    public function show(Cage $cage)
    {
        return view('cages.show', compact('cage'));
    }

    public function edit(Cage $cage)
    {
        return view('cages.edit', compact('cage'));
    }

    public function update(Request $request, Cage $cage)
    {
        $request->validate([
            'capacity' => 'required|integer|min:'.$cage->animals()->count(),
            'name' => 'required|string|max:255',
        ]);

        $cage->update($request->only('name', 'capacity'));
        return redirect()->route('cages.index')->with('success', 'Клетка успешно обновлена');
    }

    public function destroy(Cage $cage)
    {
        if ($cage->animals()->exists()) {
            return redirect()->route('cages.index')->with('error', 'Удаление невозможно, так как в клетке есть животные');
        }

        $cage->delete();
        return redirect()->route('cages.index')->with('success', 'Клетка успешно удалена');
    }
}
