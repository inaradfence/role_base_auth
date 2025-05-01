<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RollerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

// Permissions
    Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/permission/store', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('/permission/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('/permission/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
    Route::get('/permission/delete/{id}', [PermissionController::class, 'destroy'])->name('permission.delete');

// Roles
    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('/', [RollerController::class, 'index'])->name('index');
        Route::get('/create', [RollerController::class, 'create'])->name('create');
        Route::post('/store', [RollerController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [RollerController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [RollerController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [RollerController::class, 'destroy'])->name('delete');
    });
    Route::get('test', function () {
        
       Mail::to('V3E7o@example.com')->send(new \App\Mail\jobPosted());
    });
   
});

require __DIR__ . '/auth.php';
