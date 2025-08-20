@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50/30">
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-800 rounded-3xl mb-8">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
        
        <div class="relative px-6 py-12 sm:px-8 sm:py-16">
            <div class="mx-auto max-w-4xl">
                <div class="flex items-center gap-4 mb-6">
                    <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 rounded-2xl bg-white/20 backdrop-blur-sm px-4 py-2 text-white hover:bg-white/30 transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Berita
                    </a>
                </div>
                
                <div class="text-center">
                    <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm rounded-2xl px-4 py-2 text-white mb-6">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5v9m7.5 1.5a9 9 0 11-15 0 9 9 0 0115 0z"/>
                        </svg>
                        <span class="text-sm font-medium">{{ optional($news->category)->name ?? 'Berita' }}</span>
                    </div>
                    
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4 leading-tight">{{ $news->title }}</h1>
                    
                    <div class="flex items-center justify-center gap-4 text-blue-100 text-sm">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                            </svg>
                            <span>{{ optional($news->published_at)->format('d M Y H:i') }}</span>
                        </div>
                        
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z"/>
                            </svg>
                            <span>{{ optional($news->category)->name ?? 'Umum' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-4xl mx-auto">
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl border border-white/20 shadow-xl p-8 mb-8">
            <!-- Action Bar -->
            <div class="flex items-center justify-between mb-8 p-4 bg-gray-50/50 rounded-2xl">
                <div class="flex items-center gap-3">
                    <button 
                        type="button" 
                        data-copy="{{ request()->fullUrl() }}" 
                        class="inline-flex items-center gap-2 rounded-xl bg-blue-50 text-blue-700 px-4 py-2.5 text-sm font-medium hover:bg-blue-100 hover:scale-105 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        data-tooltip="Salin tautan berita ini"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                        </svg>
                        Salin Tautan
                    </button>
                    
                    <button 
                        type="button" 
                        class="inline-flex items-center gap-2 rounded-xl bg-green-50 text-green-700 px-4 py-2.5 text-sm font-medium hover:bg-green-100 hover:scale-105 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                        data-tooltip="Bagikan berita ini"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                        </svg>
                        Bagikan
                    </button>
                </div>
                
                <a 
                    href="{{ route('news.index') }}" 
                    class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-2.5 text-sm font-medium shadow-md hover:shadow-lg hover:scale-105 active:scale-95 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5v9m7.5 1.5a9 9 0 11-15 0 9 9 0 0115 0z"/>
                    </svg>
                    Lihat Semua Berita
                </a>
            </div>

            <!-- Article Content -->
            <article class="reveal-on-scroll prose prose-lg max-w-none">
                <div class="text-gray-800 leading-relaxed">
                    {!! nl2br(e($news->content)) !!}
                </div>
            </article>
        </div>

        <!-- Related Actions -->
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl border border-white/20 shadow-xl p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Apa selanjutnya?</h2>
            
            <div class="grid md:grid-cols-3 gap-6">
                <a href="{{ route('news.index') }}" class="group bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 group-hover:bg-blue-200 transition-colors duration-300 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5v9m7.5 1.5a9 9 0 11-15 0 9 9 0 0115 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Baca Berita Lain</h3>
                    <p class="text-gray-600 text-sm">Jelajahi berita dan acara terbaru lainnya</p>
                </a>
                
                <a href="{{ route('research.publications') }}" class="group bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 rounded-xl bg-green-100 group-hover:bg-green-200 transition-colors duration-300 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Publikasi Penelitian</h3>
                    <p class="text-gray-600 text-sm">Lihat hasil penelitian dan publikasi terbaru</p>
                </a>
                
                <a href="{{ route('research.projects') }}" class="group bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 rounded-xl bg-purple-100 group-hover:bg-purple-200 transition-colors duration-300 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Proyek Penelitian</h3>
                    <p class="text-gray-600 text-sm">Jelajahi proyek penelitian yang sedang berlangsung</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection


