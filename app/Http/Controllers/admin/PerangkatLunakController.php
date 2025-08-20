<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perangkatlunak;
use App\Models\Student;

class PerangkatLunakController extends Controller
{

    public function index_admin(Request $request)
    {
        $query = Perangkatlunak::with('student');

        // Combined search: name, student name
        if ($request->filled('search')) {
            $term = trim((string) $request->search);
            $query->where(function ($q) use ($term) {
                // Name contains term
                $q->where('name', 'like', '%' . $term . '%')
                  // Student name contains term
                  ->orWhereHas('student', function ($qs) use ($term) {
                      $qs->where('name', 'like', '%' . $term . '%');
                  });
            });
        }

        // Filter by student name
        if ($request->filled('student_name')) {
            $studentName = $request->student_name;
            $query->whereHas('student', function ($q) use ($studentName) {
                $q->where('name', 'like', '%' . $studentName . '%');
            });
        }

        // Filter by created_at (start date)
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        // Filter by created_at (end date)
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $perangkatlunaks = $query->latest()->paginate(10);

        return view('admin.perangkat_lunak.index', compact('perangkatlunaks'));
    }

    public function create()
    {
        $mahasiswas = Student::all();
        return view('admin.perangkat_lunak.create', compact('mahasiswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'repo_url' => 'nullable|url|max:255',
            'website_url' => 'nullable|url|max:255',
            'student_id' => 'nullable|exists:students,id',
        ]);

        Perangkatlunak::create($request->all());

        return redirect()->route('perangkatlunak.index')
            ->with('success', 'Perangkat Lunak berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $perangkatlunak = Perangkatlunak::findOrFail($id);
        $mahasiswas = Student::all();
        return view('admin.perangkat_lunak.edit', compact('perangkatlunak', 'mahasiswas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'repo_url' => 'nullable|url|max:255',
            'website_url' => 'nullable|url|max:255',
            'student_id' => 'nullable|exists:students,id',
        ]);

        $perangkatlunak = Perangkatlunak::findOrFail($id);
        $perangkatlunak->update($request->all());

        return redirect()->route('perangkatlunak.index')
            ->with('success', 'Perangkat Lunak berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $perangkatlunak = Perangkatlunak::findOrFail($id);
        $perangkatlunak->delete();

        return redirect()->route('perangkatlunak.index')
            ->with('success', 'Perangkat Lunak berhasil dihapus!');
    }
}

