<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;




Route::get('/', [DashboardController::class, 'index'])->name('dashboard');



// to create
Route::post('/idea', [IdeaController::class, 'store'])->name('idea.create')->middleware('auth');

// to delete
Route::delete('idea/{id}', [IdeaController::class, 'destroy'])->name('idea.destroy')->middleware('auth');

// single data show garxa
Route::get('/idea/{id}', [IdeaController::class, 'show'])->name('idea.show')->middleware('auth');

// edit garna ko lage form lauxa
Route::get('/idea/{id}/edit', [IdeaController::class, 'edit'])->name('idea.edit')->middleware('auth');

Route::put('/idea/{id}', [IdeaController::class, 'update'])->name('idea.update')->middleware('auth');

// Comment section work

Route::post('/idea/{id}/comments', [CommentController::class, 'store'])->name('idea.comments.store');




// Register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);


// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

// logout

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Profile

// Route::


Route::get('/terms', function () {
    return view('terms');
});
