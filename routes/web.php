<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

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




