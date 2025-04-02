<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StudentController;

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');;
Route::put('/students/submit.php', [StudentController::class, 'update']);
Route::delete('/students/submit.php', [StudentController::class, 'destroy']);


Route::middleware(['auth'])->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/login_page', [LoginController::class, 'showLoginForm'])->name('login_page');
Route::post('/login', [AuthController::class, 'login'])->name('login_process');


Route::get('/signup_page', [AuthController::class, 'showSignUpForm'])->name('signup_page');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup_process');




