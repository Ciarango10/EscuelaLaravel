<?php
use App\Http\Controllers\StudentsController;

Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
Route::get('/students/edit/{id}', [StudentsController::class, 'edit'])->name('students.edit');

Route::post('/students/store', [StudentsController::class, 'store'])->name('students.store');
Route::put('/students/update', [StudentsController::class, 'update'])->name('students.update');
Route::delete('/students/delete/{id}', [StudentsController::class, 'delete'])->name('students.delete');