<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
