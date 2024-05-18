<?php
use App\Http\Controllers\SubjectsController;

Route::get('/subjects', [SubjectsController::class, 'index'])->name('subjects.index');
Route::get('/subjects/create', [SubjectsController::class, 'create'])->name('subjects.create');
Route::get('/subjects/edit/{id}', [SubjectsController::class, 'edit'])->name('subjects.edit');

Route::post('/subjects/store', [SubjectsController::class, 'store'])->name('subjects.store');
Route::put('/subjects/update', [SubjectsController::class, 'update'])->name('subjects.update');
Route::delete('/subjects/delete/{id}', [SubjectsController::class, 'delete'])->name('subjects.delete');