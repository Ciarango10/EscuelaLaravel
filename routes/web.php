<?php
use App\Http\Controllers\HomeController;
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
Route::post('/teachers/store',[TeachersController::class, 'store'])->name('teachers.store'); 
Route::put('/teachers/update',[TeachersController::class, 'update'])->name('teachers.update');  
Route::delete('/teachers/delete/{id}',[TeachersController::class, 'delete'])->name('teachers.delete');   

#Students
Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
