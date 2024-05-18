<?php
use App\Http\Controllers\EnrollmentsController;

Route::get('/enrollments', [EnrollmentsController::class, 'index'])->name('enrollments.index');
Route::get('/enrollments/create', [EnrollmentsController::class, 'create'])->name('enrollments.create');
Route::get('/enrollments/edit/{id}', [EnrollmentsController::class, 'edit'])->name('enrollments.edit');
Route::get('/enrollments/getEnrollmentData/{id}', [EnrollmentsController::class, 'getEnrollmentData'])->name('enrollments.getEnrollmentData');

Route::post('/enrollments/store', [EnrollmentsController::class, 'store'])->name('enrollments.store');
Route::put('/enrollments/update', [EnrollmentsController::class, 'update'])->name('enrollments.update');
Route::delete('/enrollments/delete/{id}', [EnrollmentsController::class, 'delete'])->name('enrollments.delete');