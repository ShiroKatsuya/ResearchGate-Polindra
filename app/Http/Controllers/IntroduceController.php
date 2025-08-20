<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Perkenalan;

class IntroduceController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->integer('year');
        $studentsQuery = Perkenalan::query()
            ->when($request->string('q')->toString(), function ($q, $term) {
                $q->where('name', 'like', "%{$term}%")
                  ->orWhere('program_study', 'like', "%{$term}%");
            })
            ->when($year, fn($q) => $q->where('year_of_graduation', $year))
            ->orderBy('name');

        $students = $studentsQuery->paginate(12)->withQueryString();
        $totalStudents = Perkenalan::count();

        return view('introduce.index', [
            'title' => 'Perkenalan Mahasiswa & Alumni',
            'students' => $students,
            'totalStudents' => $totalStudents,
            'search' => $request->string('q')->toString(),
            'year' => $year,
        ]);
    }
}


