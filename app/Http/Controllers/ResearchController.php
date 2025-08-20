<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Project;
use App\Models\Software;
use Illuminate\Http\Request;
use App\Models\publikasi;
use App\Models\Proyek;
use App\Models\Perangkatlunak;

class ResearchController extends Controller
{
    public function publications(Request $request)
    {
        $query = publikasi::with('student')
            ->when($request->string('q')->toString(), function ($q, $term) {
                $q->where('title', 'like', "%{$term}%")
                  ->orWhere('journal', 'like', "%{$term}%");
            })
            ->latest('published_at');

        $publications = $query->paginate(10)->withQueryString();

        $journals = publikasi::whereNotNull('journal')
        ->distinct()
        ->pluck('journal')
        ->filter()
        ->values();

        return view('research.publications', [
            'title' => 'Publikasi Ilmiah Mahasiswa',
            'publications' => $publications,
            'search' => $request->string('q')->toString(),
            'journals' => $journals,
        ]);
    }

    public function projects(Request $request)
    {
        $status = $request->string('status')->toString();
        $projects = Proyek::with('student')
            ->when($request->string('q')->toString(), function ($q, $term) {
                $q->where('title', 'like', "%{$term}%")
                  ->orWhere('description', 'like', "%{$term}%");
            })
            ->when($status, fn($q) => $q->where('status', $status))
            ->latest('start_date')
            ->paginate(10)->withQueryString();

        return view('research.projects', [
            'title' => 'Proyek Mahasiswa',
            'projects' => $projects,
            'search' => $request->string('q')->toString(),
            'status' => $status,
        ]);
    }

    public function software(Request $request)
    {
        $software = Perangkatlunak::with('student')
            ->when($request->string('q')->toString(), function ($q, $term) {
                $q->where('name', 'like', "%{$term}%")
                  ->orWhere('description', 'like', "%{$term}%");
            })
            ->latest('updated_at')
            ->paginate(12)->withQueryString();

        return view('research.software', [
            'title' => 'Perangkat Lunak Mahasiswa',
            'software' => $software,
            'search' => $request->string('q')->toString(),
        ]);
    }
}


