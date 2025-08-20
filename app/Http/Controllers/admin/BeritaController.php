<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index_admin(Request $request)
    {
        $query = \App\Models\Berita::query()->with('category');

        // Combined search: title, content, slug, year(published_at)
        if ($request->filled('search')) {
            $term = trim((string) $request->search);
            $query->where(function ($q) use ($term) {
                $q->where('title', 'like', '%' . $term . '%')
                  ->orWhere('content', 'like', '%' . $term . '%')
                  ->orWhere('slug', 'like', '%' . $term . '%');

                if (preg_match('/^\\d{4}$/', $term)) {
                    $q->orWhereYear('published_at', (int) $term);
                }
            });
        }

        // Filter by published_at (start date)
        if ($request->filled('start_date')) {
            $query->whereDate('published_at', '>=', $request->start_date);
        }

        // Filter by published_at (end date)
        if ($request->filled('end_date')) {
            $query->whereDate('published_at', '<=', $request->end_date);
        }

        $beritas = $query->latest()->paginate(10);

        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        $categories = \App\Models\NewsCategory::orderBy('name')->get();
        return view('admin.berita.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'nullable|integer|exists:news_categories,id',
            'published_at' => 'nullable|date',
            'slug' => 'nullable|string|max:255|unique:beritas,slug',
        ]);

        $data = $request->all();
        if (empty($data['slug'])) {
            $base = Str::slug($data['title']);
            $slug = $base;
            $i = 1;
            while (\App\Models\Berita::where('slug', $slug)->exists()) {
                $slug = $base . '-' . $i;
                $i++;
            }
            $data['slug'] = $slug;
        }

        \App\Models\Berita::create($data);

        return redirect()->route('berita.index')
            ->with('success', 'Data berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = \App\Models\Berita::with('category')->findOrFail($id);
        $categories = \App\Models\NewsCategory::orderBy('name')->get();
        return view('admin.berita.edit', compact('berita', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'nullable|integer|exists:news_categories,id',
            'published_at' => 'nullable|date',
            'slug' => 'nullable|string|max:255|unique:beritas,slug,' . $id,
        ]);

        $berita = \App\Models\Berita::findOrFail($id);

        $data = $request->all();
        if (empty($data['slug'])) {
            $base = Str::slug($data['title']);
            $slug = $base;
            $i = 1;
            while (\App\Models\Berita::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $base . '-' . $i;
                $i++;
            }
            $data['slug'] = $slug;
        }

        $berita->update($data);

        return redirect()->route('berita.index')
            ->with('success', 'Data berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = \App\Models\Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('berita.index')
            ->with('success', 'Data berita berhasil dihapus!');
    }
}
