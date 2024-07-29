<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ViolationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
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



Route::middleware('auth')->group(function () {
Route::get('/major', [MajorController::class, 'index'])->name('major');
Route::get('/major/create', [MajorController::class, 'create'])->name('major.create');
Route::post('/major/create', [MajorController::class, 'store'])->name('major.store');
Route::get('/major/{id}/edit', [MajorController::class, 'edit'])->name('major.edit');
Route::post('/major/{id}/edit', [MajorController::class, 'update'])->name('major.update');
Route::delete('/major/{id}/destroy', [MajorController::class, 'destroy'])->name('major.update');

Route::get('/class', [ClassController::class, 'index'])->name('class');
Route::get('/class/create', [ClassController::class, 'create'])->name('class.create');
Route::post('/class/create', [ClassController::class, 'store'])->name('class.store');
Route::get('/class/{id}/edit', [ClassController::class, 'edit'])->name('class.edit');
Route::post('/class/{id}/edit', [ClassController::class, 'update'])->name('class.update');
Route::delete('/class/{id}/destroy', [ClassController::class, 'destroy'])->name('class.update');

Route::get('/violation', [ViolationController::class, 'index'])->name('violation');
Route::get('/violation/create', [ViolationController::class, 'create'])->name('violation.create');
Route::post('/violation/create', [ViolationController::class, 'store'])->name('violation.store');
Route::get('/violation/{id}/edit', [ViolationController::class, 'edit'])->name('violation.edit');
Route::post('/violation/{id}/edit', [ViolationController::class, 'update'])->name('violation.update');
Route::delete('/violation/{id}/destroy', [ViolationController::class, 'destroy'])->name('violation.update');

Route::get('/student', [StudentController::class, 'index'])->name('student');
Route::get('/student/{id}/detail', [StudentController::class, 'show'])->name('student.detail');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student/create', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/student/{id}/edit', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{id}/destroy', [StudentController::class, 'destroy'])->name('student.update');

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/{id}/edit', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}/destroy', [UserController::class, 'destroy'])->name('user.update');


Route::get('/home', [homeController::class, 'index'])->name('home');
Route::get('/report', [ReportController::class, 'index'])->name('report');
Route::post('/report', [ReportController::class, 'store'])->name('store');
});








