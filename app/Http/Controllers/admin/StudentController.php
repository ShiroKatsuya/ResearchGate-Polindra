<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    

    public function index_admin(Request $request)
    {
        $query = Student::query();

        // Combined search: name, program_study, email, phone, year_of_graduation
        if ($request->filled('search')) {
            $term = trim((string) $request->search);
            $query->where(function ($q) use ($term) {
                $q->where('name', 'like', '%' . $term . '%')
                  ->orWhere('program_study', 'like', '%' . $term . '%')
                  ->orWhere('year_of_graduation', 'like', '%' . $term . '%')
                  ->orWhere('email', 'like', '%' . $term . '%')
                  ->orWhere('phone', 'like', '%' . $term . '%');
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

        $students = $query->latest()->paginate(10);

        return view('admin.student.index', compact('students'));
    }

    public function create()
    {
        return view('admin.student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'program_study' => 'nullable|string|max:255',
            'year_of_graduation' => 'nullable|integer',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:30',
        ]);

        Student::create($request->only([
            'name',
            'program_study',
            'year_of_graduation',
            'email',
            'phone',
        ]));

        return redirect()->route('student.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'program_study' => 'nullable|string|max:255',
            'year_of_graduation' => 'nullable|integer',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:30',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->only([
            'name',
            'program_study',
            'year_of_graduation',
            'email',
            'phone',
        ]));

        return redirect()->route('student.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('student.index')
            ->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}
