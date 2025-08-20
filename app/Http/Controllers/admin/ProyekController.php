<?php

namespace App\Http\Controllers\admin;
use App\Models\Proyek;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProyekController extends Controller
{


    public function index_admin(Request $request)
    {
        $query = Proyek::with('student');

        // Combined search: title, student name, and year (start/end)
        if ($request->filled('search')) {
            $term = trim((string) $request->search);
            $query->where(function ($q) use ($term) {
                // Title contains term
                $q->where('title', 'like', '%' . $term . '%')
                  // Student name contains term
                  ->orWhereHas('student', function ($qs) use ($term) {
                      $qs->where('name', 'like', '%' . $term . '%');
                  });

                // If the term looks like a 4-digit year, match start/end year too
                if (preg_match('/^\d{4}$/', $term)) {
                    $year = (int) $term;
                    $q->orWhereYear('start_date', $year)
                      ->orWhereYear('end_date', $year);
                }
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by start date
        if ($request->filled('start_date')) {
            $query->whereDate('start_date', $request->start_date);
        }

        // Filter by end date
        if ($request->filled('end_date')) {
            $query->whereDate('end_date', $request->end_date);
        }

        // Filter by student name
        if ($request->filled('student_name')) {
            $studentName = $request->student_name;
            $query->whereHas('student', function ($q) use ($studentName) {
                $q->where('name', 'like', '%' . $studentName . '%');
            });
        }

        // Filter by year (matches start_date or end_date year)
        if ($request->filled('year')) {
            $year = (int) $request->year;
            $query->where(function ($q) use ($year) {
                $q->whereYear('start_date', $year)
                  ->orWhereYear('end_date', $year);
            });
        }

        $proyeks = $query->latest()->paginate(10);

        // Get unique statuses for filter dropdown
        $statuses = Proyek::whereNotNull('status')
            ->distinct()
            ->pluck('status')
            ->filter()
            ->values();

        return view('admin.proyek.index', compact('proyeks', 'statuses'));
    }

    public function create()
    {
        $mahasiswas = Student::all();
        return view('admin.proyek.create', compact('mahasiswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:berjalan,selesai,tertunda',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'repository_url' => 'nullable|url|max:255',
            'student_id' => 'nullable|exists:students,id',
        ]);

        Proyek::create($request->all());

        return redirect()->route('proyek.index')
            ->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $proyek = Proyek::findOrFail($id);
        $mahasiswas = Student::all();
        return view('admin.proyek.edit', compact('proyek', 'mahasiswas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:berjalan,selesai,tertunda',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'repository_url' => 'nullable|url|max:255',
            'student_id' => 'nullable|exists:students,id',
        ]);

        $proyek = Proyek::findOrFail($id);
        $proyek->update($request->all());

        return redirect()->route('proyek.index')
            ->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $proyek = Proyek::findOrFail($id);
        $proyek->delete();

        return redirect()->route('proyek.index')
            ->with('success', 'Proyek berhasil dihapus!');
    }
}
