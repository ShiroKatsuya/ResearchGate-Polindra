<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Project;
use App\Models\Software;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    public function publications(Request $request)
    {
        $query = Publication::with('student')
            ->when($request->string('q')->toString(), function ($q, $term) {
                $q->where('title', 'like', "%{$term}%")
                  ->orWhere('journal', 'like', "%{$term}%");
            })
            ->latest('published_at');

        $publications = $query->paginate(10)->withQueryString();

        return view('research.publications', [
            'title' => 'Publikasi Ilmiah Mahasiswa',
            'publications' => $publications,
            'search' => $request->string('q')->toString(),
        ]);
    }

    public function projects(Request $request)
    {
        $status = $request->string('status')->toString();
        $projects = Project::with('student')
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
        $software = Software::with('student')
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


