@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50/30">
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-800 rounded-3xl mb-8">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
        
        <div class="relative px-6 py-12 sm:px-8 sm:py-16">
            <div class="mx-auto max-w-4xl text-center">
                <div class="flex items-center justify-center mb-6">
                    <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5v9m7.5 1.5a9 9 0 11-15 0 9 9 0 0115 0z"/>
                        </svg>
                    </div>
                    <div class="text-left">
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-2">Berita & Acara Internal</h1>
                        <p class="text-blue-100 text-lg sm:text-xl">Informasi terbaru seputar kampus dan kegiatan</p>
                    </div>
                </div>
                
                <div class="inline-flex items-center gap-3 bg-white/20 backdrop-blur-sm rounded-2xl px-6 py-3 text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5v9m7.5 1.5a9 9 0 11-15 0 9 9 0 0115 0z"/>
                    </svg>
                    <span class="font-semibold">{{ method_exists($news, 'total') ? number_format($news->total()) : '0' }}</span>
                    <span class="text-blue-100">artikel tersedia</span>
                </div>
        </div>
        </div>
    </div>

    <!-- Enhanced Search Section -->
<div class="mb-8">
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl border border-white/20 shadow-xl p-6">
            <form method="get" class="space-y-4">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
                    <div class="lg:col-span-2 relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500 transition-colors duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.3-4.3M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16Z"/>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="q" 
                            value="{{ $search }}" 
                            placeholder="Cari judul, deskripsi, atau teknologi..." 
                            class="w-full pl-12 pr-4 py-4 rounded-xl border border-gray-200 bg-white/50 backdrop-blur-sm text-gray-900 placeholder-gray-500 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 transition-all duration-200 hover:bg-white/70"
                            autocomplete="off"
                        />
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                            <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                        </div>
                    </div>
                    
                    <div class="lg:col-span-2 flex gap-3">
                        <button 
                            type="submit" 
                            class="flex-1 inline-flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4 text-white font-semibold shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Terapkan Filter
                        </button>
                        
                        <button 
                            type="button" 
                            data-open-modal="news-help-modal" 
                            class="inline-flex items-center gap-2 rounded-xl ring-1 ring-gray-300 bg-white/80 backdrop-blur-sm px-4 py-4 text-gray-700 hover:text-blue-700 hover:ring-blue-300 hover:bg-blue-50/50 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            data-tooltip="Tips filter"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="hidden sm:inline">Bantuan</span>
                        </button>
                    </div>
                </div>
                
                @if($search)
                <div class="flex items-center gap-3 text-sm text-gray-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <span>Filter aktif:</span>
                    @if($search)
                        <span class="inline-flex items-center gap-1 bg-blue-50 text-blue-700 px-2 py-1 rounded-full text-xs">
                            Pencarian: "{{ $search }}"
                            <button type="button" onclick="document.querySelector('input[name=q]').value=''; this.closest('form').submit();" class="text-blue-600 hover:text-blue-800">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </span>
                    @endif
                    <a href="{{ route('news.index') }}" class="text-blue-600 hover:text-blue-700 underline">Hapus semua filter</a>
                </div>
                @endif
            </form>
        </div>
        </div>

    <!-- News Grid -->
    <div class="grid gap-6 md:grid-cols-2">
        @forelse($news as $item)
            <article class="reveal-on-scroll group bg-white/80 backdrop-blur-sm rounded-2xl border border-white/20 shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all duration-500 overflow-hidden">
                <div class="p-6">
                    <!-- Header -->
                    <div class="flex items-start justify-between gap-3 mb-4">
                        <div class="flex-1 min-w-0">
                            <h2 class="text-lg font-bold text-gray-900 line-clamp-2 group-hover:text-blue-700 transition-colors duration-200">
                                <a href="{{ route('news.show', $item) }}" class="hover:underline">{{ $item->title }}</a>
                            </h2>
                        </div>
                        
                        <div class="shrink-0">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-yellow-100 text-yellow-800 border border-yellow-200 px-3 py-1.5 text-xs font-semibold">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5v9m7.5 1.5a9 9 0 11-15 0 9 9 0 0115 0z"/>
                                </svg>
                                Info
                            </span>
                        </div>
                    </div>
                    
                    <!-- Metadata -->
                    <div class="mb-4 space-y-2">
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z"/>
                            </svg>
                            <span><span class="font-medium text-gray-700">Kategori:</span> {{ optional($item->category)->name ?? '-' }}</span>
                        </div>
                        
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                            </svg>
                            <span><span class="font-medium text-gray-700">Diterbitkan:</span> {{ optional($item->published_at)->format('d M Y H:i') }}</span>
                        </div>
                    </div>

                    <!-- Content Preview -->
                    <div class="mb-6">
                        <p class="text-gray-700 line-clamp-3 leading-relaxed">{{ Str::limit(strip_tags($item->content), 180) }}</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between">
                        <a 
                            href="{{ route('news.show', $item) }}" 
                            class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2.5 text-sm font-medium shadow-md hover:shadow-lg hover:scale-105 active:scale-95 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            data-tooltip="Baca selengkapnya"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            Baca Selengkapnya
                        </a>
                        
                        <div class="flex items-center gap-2">
                            <button 
                                type="button" 
                                class="inline-flex items-center gap-2 rounded-xl bg-gray-50 text-gray-700 px-3 py-2 text-xs font-medium hover:bg-gray-100 hover:scale-105 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                                data-tooltip="Bagikan berita ini"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                </svg>
                                Bagikan
                            </button>
                        </div>
                </div>
                </div>
                
                <!-- Hover Effect Border -->
                <div class="h-1 bg-gradient-to-r from-blue-500 via-indigo-500 to-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
            </article>
        @empty
            <div class="md:col-span-2 text-center py-16">
                <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gray-100 flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5v9m7.5 1.5a9 9 0 11-15 0 9 9 0 0115 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum ada berita</h3>
                <p class="text-gray-600 mb-6">Saat ini belum ada berita atau acara yang tersedia.</p>
                @if($search || $activeCategory)
                <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 rounded-xl bg-blue-600 text-white px-6 py-3 font-medium hover:bg-blue-700 transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Lihat semua berita
                </a>
                @endif
            </div>
        @endforelse
    </div>

    <!-- Enhanced Pagination -->
    @if(method_exists($news, 'hasPages') && $news->hasPages())
    <div class="mt-12 pt-8 border-t border-gray-200/50">
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-600">
                Menampilkan {{ $news->firstItem() ?? 0 }} - {{ $news->lastItem() ?? 0 }} dari {{ $news->total() }} berita
            </div>
            <div class="flex items-center gap-2">
        {{ $news->withQueryString()->links() }}
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Enhanced Help Modal -->
<div id="news-help-modal" class="fixed inset-0 z-50 hidden" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity duration-300" @click="$dispatch('close-modal')"></div>
        
        <!-- Modal Content -->
        <div class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl ring-1 ring-gray-900/5 w-full sm:max-w-2xl transition-all duration-300 scale-95 opacity-0" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-8 text-white">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold">Tips Pencarian Berita</h3>
                        <p class="text-blue-100 text-lg">Cara menemukan berita dan acara dengan cepat</p>
                    </div>
                </div>
            </div>
            
            <!-- Content -->
            <div class="px-8 py-8 space-y-6">
                <div class="grid gap-6">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-2">Kata Kunci Spesifik</h4>
                            <p class="text-gray-600">Gunakan kata kunci yang spesifik untuk mendapatkan hasil yang lebih relevan dan akurat.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-indigo-100 flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-2">Filter Kategori</h4>
                            <p class="text-gray-600">Pilih kategori tertentu untuk mempersempit hasil pencarian dan menemukan berita yang sesuai minat Anda.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-2">Pencarian Cepat</h4>
                            <p class="text-gray-600">Gunakan pencarian kata kunci untuk menemukan berita yang relevan dengan cepat dan mudah.</p>
                        </div>
                    </div>
          </div>
                
                <div class="bg-blue-50 rounded-2xl p-6">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-blue-900 mb-1">Pro Tip</h4>
                            <p class="text-blue-800 text-sm">Berita terbaru akan selalu muncul di bagian atas. Gunakan pencarian kata kunci dan filter kategori untuk menemukan konten yang paling relevan dengan kebutuhan Anda.</p>
          </div>
        </div>
      </div>
    </div>

            <!-- Footer -->
            <div class="bg-gray-50 px-8 py-6 flex justify-end">
                <button 
                    @click="$dispatch('close-modal')" 
                    class="inline-flex items-center gap-2 rounded-xl bg-white px-6 py-3 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-gray-300 hover:bg-gray-50 hover:ring-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
@endsection


