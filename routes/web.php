<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])
    ->name('home.index')
    ->middleware(AuthorizedMiddleware::class);

#Teachers
include('web/teachers.php');

#Students
include('web/students.php');

#Classrooms
include('web/classrooms.php');

#Subjects
include('web/subjects.php');

#Grades
include('web/grades.php');

#Enrollments
include('web/enrollments.php');

#Roles
include('web/roles.php');
