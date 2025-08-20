<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\StudentController;

Route::get('/admin/student', [StudentController::class, 'index_admin'])->name('student.index');
Route::get('/admin/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/admin/student', [StudentController::class, 'store'])->name('student.store');
Route::get('/admin/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/admin/student/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/admin/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');