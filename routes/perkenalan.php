<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\PerkenalanLunakController;
Route::middleware('require.auth')->group(function () {
Route::get('/admin/perkenalan', [PerkenalanLunakController::class, 'index_admin'])->name('perkenalan.index');
Route::get('/admin/perkenalan/create', [PerkenalanLunakController::class, 'create'])->name('perkenalan.create');
Route::post('/admin/perkenalan', [PerkenalanLunakController::class, 'store'])->name('perkenalan.store');
Route::get('/admin/perkenalan/{id}/edit', [PerkenalanLunakController::class, 'edit'])->name('perkenalan.edit');
Route::put('/admin/perkenalan/{id}', [PerkenalanLunakController::class, 'update'])->name('perkenalan.update');
Route::delete('/admin/perkenalan/{id}', [PerkenalanLunakController::class, 'destroy'])->name('perkenalan.destroy');
});