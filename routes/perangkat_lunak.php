<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\PerangkatLunakController;
Route::middleware('require.auth')->group(function () {
Route::get('/admin/perangkat-lunak', [PerangkatLunakController::class, 'index_admin'])->name('perangkatlunak.index');
Route::get('/admin/perangkat-lunak/create', [PerangkatLunakController::class, 'create'])->name('perangkatlunak.create');
Route::post('/admin/perangkat-lunak', [PerangkatLunakController::class, 'store'])->name('perangkatlunak.store');
Route::get('/admin/perangkat-lunak/{id}/edit', [PerangkatLunakController::class, 'edit'])->name('perangkatlunak.edit');
Route::put('/admin/perangkat-lunak/{id}', [PerangkatLunakController::class, 'update'])->name('perangkatlunak.update');
Route::delete('/admin/perangkat-lunak/{id}', [PerangkatLunakController::class, 'destroy'])->name('perangkatlunak.destroy');
});