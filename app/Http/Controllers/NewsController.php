<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $categorySlug = $request->string('kategori')->toString();
        $search = $request->string('q')->toString();

        $query = News::with('category')
            ->when($categorySlug, function ($q, $slug) {
                $q->whereHas('category', fn($cq) => $cq->where('slug', $slug));
            })
            ->when($search, function ($q, $term) {
                $q->where('title', 'like', "%{$term}%")
                  ->orWhere('content', 'like', "%{$term}%");
            })
            ->latest('published_at');

        $news = $query->paginate(8)->withQueryString();
        $categories = NewsCategory::orderBy('name')->get();

        return view('news.index', [
            'title' => 'Berita & Acara Internal Polindra',
            'news' => $news,
            'categories' => $categories,
            'activeCategory' => $categorySlug,
            'search' => $search,
        ]);
    }

    public function show(News $news)
    {
        return view('news.show', [
            'title' => $news->title,
            'news' => $news->load('category'),
        ]);
    }
}


