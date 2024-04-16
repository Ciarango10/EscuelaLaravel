<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentsController;
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

#Registration
Route::get('/Registration', [RegistrationController::class, 'Index'])->name('Registration.index');
Route::get('/Registration/create', [RegistrationController::class, 'create'])->name('Registration.create');
Route::get('/Registration/edit{id}', [RegistrationController::class, 'edit'])->name('Registration.edit');

Route::post('/Registration/store', [StudentsController::class, 'store'])->name('Registration.store');
Route::put('/Registration/update', [StudentsController::class, 'update'])->name('Registration.update');
Route::delete('/Registration/delete/{id}', [StudentsController::class, 'delete'])->name('Registration.delete');
