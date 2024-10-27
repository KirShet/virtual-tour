<?php

namespace App\Http\Controllers;

use App\Models\Cage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cage = Cage::width('animals')->get();

        return view('home', compact('cages'));
    }
}
