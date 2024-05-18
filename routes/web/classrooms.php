<?php
use App\Http\Controllers\ClassroomsController;

Route::get('/classrooms', [ClassroomsController::class, 'index'])->name('classrooms.index');
Route::get('/classrooms/create', [ClassroomsController::class, 'create'])->name('classrooms.create');
Route::get('/classrooms/edit/{id}', [ClassroomsController::class, 'edit'])->name('classrooms.edit');

Route::post('/classrooms/store', [ClassroomsController::class, 'store'])->name('classrooms.store');
Route::put('/classrooms/update', [ClassroomsController::class, 'update'])->name('classrooms.update');
Route::delete('/classrooms/delete/{id}', [ClassroomsController::class, 'delete'])->name('classrooms.delete');
