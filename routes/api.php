<?php

use Illuminate\Support\Facades\Route;
use App\Models\publikasi;
use App\Models\Student;
use App\Models\Berita;
use App\Models\Perangkatlunak;
use App\Models\Proyek;

Route::get('/stats/overview', function () {
    return response()->json([
        'publications' => publikasi::count(),
        'projects' => Proyek::count(),
        'software' => Perangkatlunak::count(),
        'students' => Student::count(),
        'news'=> Berita::count(),
        
    ]);
});


