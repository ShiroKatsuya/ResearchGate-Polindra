<?php

use Illuminate\Support\Facades\Route;
use App\Models\Publication;
use App\Models\Project;
use App\Models\Software;

Route::get('/stats/overview', function () {
    return response()->json([
        'publications' => Publication::count(),
        'projects' => Project::count(),
        'software' => Software::count(),
    ]);
});


