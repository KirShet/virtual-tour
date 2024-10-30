<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnimalController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::resource('cages', CageController::class);

Route::resource('animals', AnimalController::class);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::resource('cages', CageController::class)->only(['create','store','destroy']);
    Route::resource('animals', AnimalController::class)->only(['create', 'store', 'destroy']);
});
Route::get('cages/{cage}/edit', [CageController::class, 'edit'])->name('cages.edit')->middleware('auth');