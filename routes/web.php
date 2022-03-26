<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Game\GameController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('games', [GameController::class, 'index'])->name('games.index');
    Route::get('games/create', [GameController::class, 'create'])->name('games.create');
    Route::post('games', [GameController::class, 'store'])->name('games.store');
    Route::get('games/{id}', [GameController::class, 'show'])->name('games.show');
    Route::get('games/{id}/edit', [GameController::class, 'edit'])->name('games.edit');
    Route::post('games/{id}', [GameController::class, 'update'])->name('games.update');
    Route::get('games/{id}/remove', [GameController::class, 'destroy'])->name('games.destroy');

    Route::get('search', [GameController::class, 'search'])->name('games.search');
});

