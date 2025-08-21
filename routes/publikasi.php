<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\PublikasiController;
Route::middleware('require.auth')->group(function () {
Route::get('/admin/publikasi', [PublikasiController::class, 'index_admin'])->name('publikasi.index');
Route::get('/admin/publikasi/create', [PublikasiController::class, 'create'])->name('publikasi.create');
Route::post('/admin/publikasi', [PublikasiController::class, 'store'])->name('publikasi.store');
Route::get('/admin/publikasi/{id}/edit', [PublikasiController::class, 'edit'])->name('publikasi.edit');
Route::put('/admin/publikasi/{id}', [PublikasiController::class, 'update'])->name('publikasi.update');
Route::delete('/admin/publikasi/{id}', [PublikasiController::class, 'destroy'])->name('publikasi.destroy');
});