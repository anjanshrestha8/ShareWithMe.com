<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;



Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// to create
Route::post('/idea', [IdeaController::class, 'store'])->name('idea.create');
// to delete
Route::delete('idea/{id}', [IdeaController::class, 'destroy'])->name('idea.destroy');
// single data show garxa
Route::get('/idea/{id}', [IdeaController::class, 'show'])->name('idea.show');
// edit garna ko lage form lauxa
Route::get('/idea/{id}/edit', [IdeaController::class, 'edit'])->name('idea.edit');

Route::put('/idea/{id}', [IdeaController::class, 'update'])->name('idea.update');








Route::get('/terms', function () {
    return view('terms');
});
