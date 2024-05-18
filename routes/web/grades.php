<?php
use App\Http\Controllers\GradesController;

Route::get('/grades', [GradesController::class, 'index'])->name('grades.index');
Route::get('/grades/create', [GradesController::class, 'create'])->name('grades.create');
Route::get('/grades/edit/{id}', [GradesController::class, 'edit'])->name('grades.edit');

Route::post('/grades/store', [GradesController::class, 'store'])->name('grades.store');
Route::put('/grades/update', [GradesController::class, 'update'])->name('grades.update');
Route::delete('/grades/delete/{id}', [GradesController::class, 'delete'])->name('grades.delete');