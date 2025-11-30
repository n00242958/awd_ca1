<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;
use App\Http\Controllers\CastingController;
use App\Http\Controllers\WatchListController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CA1 Movies
// todo use auth middleware in routes
// ->middleware('auth')

Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');

Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::put('/movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');

// nested routes (create etc)
Route::post('/movies/{movie}/castings/create', [CastingController::class, 'store'])->name('castings.create');
Route::post('/movies/{movie}/castings', [CastingController::class, 'store'])->name('castings.store');

// resource routes for castings
//Route::resource('castings', CastingController::class);

Route::resource('watch_lists', WatchListController::class);

require __DIR__.'/auth.php';
