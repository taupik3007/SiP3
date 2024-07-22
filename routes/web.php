<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MajorController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/coba', function () {
    // dd(4.2);
    return view('master.main');

    
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::get('/major', [MajorController::class, 'index'])->name('major');
Route::get('/major/create', [MajorController::class, 'create'])->name('major.create');
Route::post('/major/create', [MajorController::class, 'store'])->name('major.store');
Route::get('/major/{id}/edit', [MajorController::class, 'edit'])->name('major.edit');
Route::post('/major/{id}/edit', [MajorController::class, 'update'])->name('major.update');
Route::delete('/major/{id}/destroy', [MajorController::class, 'destroy'])->name('major.update');







