<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\IntroduceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\RequireAuth;

require_once 'publikasi.php';
require_once 'proyek.php';
require_once 'perangkat_lunak.php';
require_once 'perkenalan.php';
require_once 'berita.php';
require_once 'student.php';

Route::get('/', fn() => view('home', ['title' => 'Gerbang Riset Mahasiswa Politeknik Negeri Indramayu']))->name('home');

// Health check for tunnel testing
Route::get('/health', function() {
    return response()->json([
        'status' => 'ok',
        'message' => 'Server is running',
        'timestamp' => now(),
        'csrf_token' => csrf_token()
    ]);
})->name('health');


// Research
Route::get('/riset/publikasi', [ResearchController::class, 'publications'])->name('research.publications');
Route::get('/riset/proyek', [ResearchController::class, 'projects'])->name('research.projects');
Route::get('/riset/perangkat-lunak', [ResearchController::class, 'software'])->name('research.software');

// Introduce
Route::get('/perkenalan', [IntroduceController::class, 'index'])->name('introduce.index');

// News
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{news:slug}', [NewsController::class, 'show'])->name('news.show');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::middleware('require.auth')->group(function () {
    Route::get('/dashboard/content', [DashboardController::class, 'content'])->name('dashboard.content');
});



// Login and Register
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [LoginController::class, 'index'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');