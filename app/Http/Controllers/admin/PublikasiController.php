<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\publikasi;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublikasiController extends Controller
{
    public function index_admin(Request $request)
    {
        $query = publikasi::with('student');

        // Search by title
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter by journal
        if ($request->filled('journal')) {
            $query->where('journal', 'like', '%' . $request->journal . '%');
        }

        // Filter by published date
        if ($request->filled('published_date')) {
            $query->whereDate('published_at', $request->published_date);
        }

        $publikasis = $query->latest()->paginate(10);
        
        // Get unique journals for filter dropdown
        $journals = publikasi::whereNotNull('journal')
            ->distinct()
            ->pluck('journal')
            ->filter()
            ->values();

        return view('admin.publikasi.index', compact('publikasis', 'journals'));
    }

    public function create()
    {
        $students = Student::all();
        return view('admin.publikasi.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'journal' => 'nullable|string|max:255',
            'abstract' => 'nullable|string',
            'doi' => 'nullable|string|max:255|unique:publikasis,doi',
            'url' => 'nullable|url|max:255',
            'student_id' => 'nullable|exists:students,id',
            'published_at' => 'nullable|date',
        ]);

        publikasi::create($request->all());

        return redirect()->route('publikasi.index')
            ->with('success', 'Publikasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $publikasi = publikasi::findOrFail($id);
        $students = Student::all();
        return view('admin.publikasi.edit', compact('publikasi', 'students'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'journal' => 'nullable|string|max:255',
            'abstract' => 'nullable|string',
            'doi' => 'nullable|string|max:255|unique:publikasis,doi,' . $id,
            'url' => 'nullable|url|max:255',
            'student_id' => 'nullable|exists:students,id',
            'published_at' => 'nullable|date',
        ]);

        $publikasi = publikasi::findOrFail($id);
        $publikasi->update($request->all());

        return redirect()->route('publikasi.index')
            ->with('success', 'Publikasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $publikasi = publikasi::findOrFail($id);
        $publikasi->delete();

        return redirect()->route('publikasi.index')
            ->with('success', 'Publikasi berhasil dihapus!');
    }
}
