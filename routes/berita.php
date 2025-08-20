<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\BeritaController;

Route::get('/admin/berita', [BeritaController::class, 'index_admin'])->name('berita.index');
Route::get('/admin/berita/create', [BeritaController::class, 'create'])->name('berita.create');
Route::post('/admin/berita', [BeritaController::class, 'store'])->name('berita.store');
Route::get('/admin/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
Route::put('/admin/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
Route::delete('/admin/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');