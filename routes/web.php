<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::resource('cages', CageController::class);

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::middleware(['auth'])->group(function(){
//     Route::resourse('animals', Animal)
// });