<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'update', 'edit', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('categories', CategoryController::class)
    ->only(['index', 'store', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('blog', BlogController::class)
    ->only(['index', 'store', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('comment', CommentController::class)
    ->only(['index', 'store', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('role', RoleController::class)
    ->only(['index', 'store', 'destroy'])
    ->middleware(['auth', 'verified']);
    
Route::resource('user', UserController::class)
        ->only(['index', 'store', 'destroy'])
        ->middleware(['auth', 'verified']);

Route::put('user/{user}/updateRole', [UserController::class, 'updateRole'])
        ->name('user.updateRole')
        ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
