<?php

namespace App\Http\Controllers;

use App\Models\Cage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cages = Cage::with('animals')->get();

        return view('home', compact('cages'));
    }
}
