<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perkenalan;

class PerkenalanLunakController extends Controller
{

    public function index_admin(Request $request)
    {
        $query = Perkenalan::query();

        // Combined search: name, program_study, email, phone
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

        $perkenalans = $query->latest()->paginate(10);

        return view('admin.perkenalan.index', compact('perkenalans'));
    }

    public function create()
    {
        return view('admin.perkenalan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'program_study' => 'nullable|string|max:255',
            'year_of_graduation' => 'nullable|integer',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        Perkenalan::create($request->all());

        return redirect()->route('perkenalan.index')
            ->with('success', 'Data perkenalan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $perkenalan = Perkenalan::findOrFail($id);
        return view('admin.perkenalan.edit', compact('perkenalan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'program_study' => 'nullable|string|max:255',
            'year_of_graduation' => 'nullable|integer',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        $perkenalan = Perkenalan::findOrFail($id);
        $perkenalan->update($request->all());

        return redirect()->route('perkenalan.index')
            ->with('success', 'Data perkenalan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $perkenalan = Perkenalan::findOrFail($id);
        $perkenalan->delete();

        return redirect()->route('perkenalan.index')
            ->with('success', 'Data perkenalan berhasil dihapus!');
    }
}
