<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProyekController;

Route::get('/admin/proyek', [ProyekController::class, 'index_admin'])->name('proyek.index');
Route::get('/admin/proyek/create', [ProyekController::class, 'create'])->name('proyek.create');
Route::post('/admin/proyek', [ProyekController::class, 'store'])->name('proyek.store');
Route::get('/admin/proyek/{id}/edit', [ProyekController::class, 'edit'])->name('proyek.edit');
Route::put('/admin/proyek/{id}', [ProyekController::class, 'update'])->name('proyek.update');
Route::delete('/admin/proyek/{id}', [ProyekController::class, 'destroy'])->name('proyek.destroy');