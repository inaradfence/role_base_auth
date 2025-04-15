<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

// Route::get('/search', [PermissionController::class, 'index_search']);
// Route::post('/search', [PermissionController::class, 'search_api'])->name('search.process');

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


    Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/permission/store', [PermissionController::class, 'store'])->name('permission.store');
});

require __DIR__ . '/auth.php';
