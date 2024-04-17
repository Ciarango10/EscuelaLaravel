<?php
use App\Http\Controllers\ClassroomsController;
use App\Http\Controllers\EnrollmentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TeachersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

#Teachers
Route::get('/teachers',[TeachersController::class, 'index'])->name('teachers.index');  
Route::get('/teachers/create',[TeachersController::class, 'create'])->name('teachers.create');
Route::get('/teachers/edit/{id}', [TeachersController::class, 'edit'])->name('teachers.edit');

Route::post('/teachers/store',[TeachersController::class, 'store'])->name('teachers.store'); 
Route::put('/teachers/update',[TeachersController::class, 'update'])->name('teachers.update');  
Route::delete('/teachers/delete/{id}',[TeachersController::class, 'delete'])->name('teachers.delete');   

#Students
Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
Route::get('/students/edit/{id}', [StudentsController::class, 'edit'])->name('students.edit');

Route::post('/students/store', [StudentsController::class, 'store'])->name('students.store');
Route::put('/students/update', [StudentsController::class, 'update'])->name('students.update');
Route::delete('/students/delete/{id}', [StudentsController::class, 'delete'])->name('students.delete');

#Classrooms
Route::get('/classrooms', [ClassroomsController::class, 'index'])->name('classrooms.index');
Route::get('/classrooms/create', [ClassroomsController::class, 'create'])->name('classrooms.create');
Route::get('/classrooms/edit/{id}', [ClassroomsController::class, 'edit'])->name('classrooms.edit');

Route::post('/classrooms/store', [ClassroomsController::class, 'store'])->name('classrooms.store');
Route::put('/classrooms/update', [ClassroomsController::class, 'update'])->name('classrooms.update');
Route::delete('/classrooms/delete/{id}', [ClassroomsController::class, 'delete'])->name('classrooms.delete');

#Subjects
Route::get('/subjects', [SubjectsController::class, 'index'])->name('subjects.index');
Route::get('/subjects/create', [SubjectsController::class, 'create'])->name('subjects.create');
Route::get('/subjects/edit/{id}', [SubjectsController::class, 'edit'])->name('subjects.edit');

Route::post('/subjects/store', [SubjectsController::class, 'store'])->name('subjects.store');
Route::put('/subjects/update', [SubjectsController::class, 'update'])->name('subjects.update');
Route::delete('/subjects/delete/{id}', [SubjectsController::class, 'delete'])->name('subjects.delete');

#Enrollments
Route::get('/enrollments', [EnrollmentsController::class, 'index'])->name('enrollments.index');
Route::get('/enrollments/create', [EnrollmentsController::class, 'create'])->name('enrollments.create');
Route::get('/enrollments/edit/{id}', [EnrollmentsController::class, 'edit'])->name('enrollments.edit');

Route::post('/enrollments/store', [EnrollmentsController::class, 'store'])->name('enrollments.store');
Route::put('/enrollments/update', [EnrollmentsController::class, 'update'])->name('enrollments.update');
Route::delete('/enrollments/delete/{id}', [EnrollmentsController::class, 'delete'])->name('enrollments.delete');