@extends('layouts.app')

@section('content')
<div class="space-y-16 lg:space-y-20">
    <!-- Enhanced Hero Section -->
    <header class="home-hero reveal-on-scroll relative overflow-hidden rounded-3xl text-white px-6 py-16 md:px-12 lg:px-16 lg:py-20 shadow-2xl shadow-primary-900/20" style="background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 50%, #1e40af 100%);">
        <!-- Animated Background Elements -->
        <div class="pointer-events-none absolute inset-0 overflow-hidden">
            <div class="absolute -top-32 -left-32 h-80 w-80 rounded-full bg-accent-400/20 blur-3xl animate-float"></div>
            <div class="absolute -bottom-32 -right-32 h-80 w-80 rounded-full bg-white/10 blur-3xl animate-float" style="animation-delay: -1.5s;"></div>
            <div class="absolute top-1/2 left-1/4 h-64 w-64 rounded-full bg-primary-300/20 blur-2xl animate-pulse-slow"></div>
        </div>
        
        <!-- Grid Pattern Overlay -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.15) 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>
        
        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-12">
            <div class="max-w-3xl space-y-6">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 text-sm px-4 py-2 rounded-full bg-white/15 backdrop-blur-sm ring-1 ring-white/25 animate-fade-in">
                    <div class="w-2 h-2 rounded-full bg-accent-400 animate-pulse"></div>
                    <span class="font-medium">Portal Riset Mahasiswa</span>
                </div>
                
                <!-- Main Heading -->
                {{-- <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold leading-tight tracking-tight animate-slide-up">
                    <span>Research Gateway</span> 
                    Mahasiswa
                    <span class="block text-accent-400 mt-2">Politeknik Negeri Indramayu</span>
                </h1> --}}
                
                <!-- Description -->
                <p class="text-lg md:text-xl text-white/90 leading-relaxed max-w-2xl animate-slide-up" style="animation-delay: 0.2s;">
                    Portal untuk informasi publikasi, proyek, dan perangkat lunak karya mahasiswa Polindra, 
                    dilengkapi informasi berita internal Politeknik Negeri Indramayu.
                </p>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 animate-slide-up" style="animation-delay: 0.4s;">
                    <a href="#features" class="group inline-flex items-center gap-3 rounded-xl bg-gradient-to-r from-accent-500 to-accent-600 text-gray-900 px-6 py-4 font-semibold shadow-xl hover:shadow-2xl hover:scale-105 active:scale-95 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-accent-500 focus:ring-offset-2 focus:ring-offset-primary-900">
                        <span class="text-white">Jelajahi Fitur</span>
                        <svg class="h-5 w-5 text-white transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    
                    <button @click="$dispatch('open-modal', 'about-modal')" class="group inline-flex items-center gap-3 rounded-xl ring-1 ring-white/30 px-6 py-4 text-white hover:bg-white/10 hover:ring-white/50 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-primary-900">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Tentang Portal</span>
                    </button>
                </div>
            </div>
            
            <!-- Hero Visual -->
            <div class="relative lg:w-96 lg:h-96 flex items-center justify-center">
                <div class="relative w-80 h-80">
                    <!-- Main Circle -->
                    <div class="absolute inset-0 rounded-full bg-gradient-to-br from-white/20 to-white/5 backdrop-blur-sm ring-1 ring-white/20 animate-pulse-slow"></div>
                    
                    <!-- Floating Elements -->
                    <div class="absolute top-8 left-8 w-16 h-16 rounded-2xl bg-accent-400/80 backdrop-blur-sm animate-bounce-gentle"></div>
                    <div class="absolute top-16 right-12 w-12 h-12 rounded-full bg-primary-300/80 backdrop-blur-sm animate-bounce-gentle" style="animation-delay: -0.5s;"></div>
                    <div class="absolute bottom-16 left-16 w-14 h-14 rounded-xl bg-white/60 backdrop-blur-sm animate-bounce-gentle" style="animation-delay: -1s;"></div>
                    
                    <!-- Center Icon -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-24 h-24 rounded-3xl bg-gradient-to-br from-white/30 to-white/10 backdrop-blur-sm ring-1 ring-white/20 flex items-center justify-center">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Enhanced Features Section -->
    <section id="features" class="space-y-8">
        <div class="text-center space-y-4 reveal-on-scroll">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Fitur Utama</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Jelajahi berbagai fitur yang tersedia untuk mendukung kegiatan riset dan pengembangan mahasiswa
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Publication Card -->
            <a href="{{ route('research.publications') }}" class="reveal-on-scroll group card-hover rounded-2xl border border-gray-200/50 bg-white/80 backdrop-blur-sm p-6 shadow-lg hover:shadow-2xl transition-all duration-500 h-full flex flex-col relative overflow-hidden" aria-label="Publikasi Ilmiah">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                    <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, #3b82f6 1px, transparent 0); background-size: 20px 20px;"></div>
                </div>
                
                <div class="relative z-10 flex items-start gap-4 mb-6">
                    <div class="flex-shrink-0">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-bold text-xl text-gray-900 group-hover:text-blue-700 transition-colors duration-300 mb-2">Publikasi Ilmiah</h3>
                        <p class="text-gray-600 leading-relaxed">Kumpulan publikasi ilmiah mahasiswa beserta informasi jurnal, DOI, dan metadata lengkap untuk referensi akademik.</p>
                    </div>
                </div>
                
                <div class="mt-auto">
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-2 text-sm font-medium text-blue-600 group-hover:text-blue-700 transition-colors duration-300">
                            Buka Fitur
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </span>
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center group-hover:bg-blue-200 transition-colors duration-300">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Projects Card -->
            <a href="{{ route('research.projects') }}" class="reveal-on-scroll group card-hover rounded-2xl border border-gray-200/50 bg-white/80 backdrop-blur-sm p-6 shadow-lg hover:shadow-2xl transition-all duration-500 h-full flex flex-col relative overflow-hidden" aria-label="Proyek Mahasiswa">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                    <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, #10b981 1px, transparent 0); background-size: 20px 20px;"></div>
                </div>
                
                <div class="relative z-10 flex items-start gap-4 mb-6">
                    <div class="flex-shrink-0">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-bold text-xl text-gray-900 group-hover:text-green-700 transition-colors duration-300 mb-2">Proyek Mahasiswa</h3>
                        <p class="text-gray-600 leading-relaxed">Proyek berjalan atau selesai dengan detail lengkap, tautan repositori, dan dokumentasi teknis.</p>
                    </div>
                </div>
                
                <div class="mt-auto">
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-2 text-sm font-medium text-green-600 group-hover:text-green-700 transition-colors duration-300">
                            Buka Fitur
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </span>
                        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center group-hover:bg-green-200 transition-colors duration-300">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Software Card -->
            <a href="{{ route('research.software') }}" class="reveal-on-scroll group card-hover rounded-2xl border border-gray-200/50 bg-white/80 backdrop-blur-sm p-6 shadow-lg hover:shadow-2xl transition-all duration-500 h-full flex flex-col relative overflow-hidden" aria-label="Perangkat Lunak">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                    <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, #f59e0b 1px, transparent 0); background-size: 20px 20px;"></div>
                </div>
                
                <div class="relative z-10 flex items-start gap-4 mb-6">
                    <div class="flex-shrink-0">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-bold text-xl text-gray-900 group-hover:text-amber-700 transition-colors duration-300 mb-2">Perangkat Lunak</h3>
                        <p class="text-gray-600 leading-relaxed">Katalog aplikasi yang dikembangkan mahasiswa dengan fitur pencarian dan filter optimal.</p>
                    </div>
                </div>
                
                <div class="mt-auto">
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-2 text-sm font-medium text-amber-600 group-hover:text-amber-700 transition-colors duration-300">
                            Buka Fitur
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </span>
                        <div class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center group-hover:bg-amber-200 transition-colors duration-300">
                            <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <!-- Additional Features Section -->
    <section class="space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Introduction Card -->
            <a href="{{ route('introduce.index') }}" class="reveal-on-scroll group card-hover rounded-2xl border border-gray-200/50 bg-white/80 backdrop-blur-sm p-6 shadow-lg hover:shadow-2xl transition-all duration-500 h-full flex flex-col relative overflow-hidden" aria-label="Perkenalan">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                    <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, #8b5cf6 1px, transparent 0); background-size: 20px 20px;"></div>
                </div>
                
                <div class="relative z-10 flex items-start gap-4 mb-6">
                    <div class="flex-shrink-0">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-bold text-xl text-gray-900 group-hover:text-purple-700 transition-colors duration-300 mb-2">Perkenalan</h3>
                        <p class="text-gray-600 leading-relaxed">Jumlah mahasiswa, daftar nama, tahun kelulusan, dan kontak.</p>
                    </div>
                </div>
                
                <div class="mt-auto">
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-2 text-sm font-medium text-purple-600 group-hover:text-purple-700 transition-colors duration-300">
                            Buka Fitur
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </span>
                        <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center group-hover:bg-purple-200 transition-colors duration-300">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>

            <!-- News Card -->
            <a href="{{ route('news.index') }}" class="reveal-on-scroll group card-hover rounded-2xl border border-gray-200/50 bg-white/80 backdrop-blur-sm p-6 shadow-lg hover:shadow-2xl transition-all duration-500 h-full flex flex-col relative overflow-hidden" aria-label="Berita Internal">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                    <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, #ef4444 1px, transparent 0); background-size: 20px 20px;"></div>
                </div>
                
                <div class="relative z-10 flex items-start gap-4 mb-6">
                    <div class="flex-shrink-0">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-bold text-xl text-gray-900 group-hover:text-red-700 transition-colors duration-300 mb-2">Berita Internal</h3>
                        <p class="text-gray-600 leading-relaxed">Berita dan acara internal Polindra dengan kategori dan pencarian yang mudah digunakan.</p>
                    </div>
                </div>
                
                <div class="mt-auto">
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-2 text-sm font-medium text-red-600 group-hover:text-red-700 transition-colors duration-300">
                            Buka Fitur
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </span>
                        <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center group-hover:bg-red-200 transition-colors duration-300">
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        {{-- <div class="mt-8">
            @include('statistic_card')
        </div> --}}
    </section>
</div>

<!-- Theme Toggle Button (bottom-right) -->
<button id="themeToggleHome" class="fixed bottom-20 right-6 z-50 rounded-full bg-white/90 backdrop-blur-sm border border-gray-200/50 shadow-xl hover:shadow-2xl hover:scale-110 active:scale-95 p-4 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all duration-300" aria-label="Ganti tema">
  <span id="themeIcon" class="text-xl">🌙</span>
  <span class="sr-only">Ganti tema terang/gelap</span>
  
</button>

<style>
  /* Minimal dark mode overrides for home page */
  .dark body { 
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
    color: #f1f5f9;
  }
  .dark .home-hero {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%) !important;
  }
  /* Card/backdrop surfaces */
  .dark .bg-white\/80 { background-color: rgba(30, 41, 59, 0.8) !important; }
  .dark .bg-white\/60 { background-color: rgba(30, 41, 59, 0.6) !important; }
  .dark .bg-white\/50 { background-color: rgba(30, 41, 59, 0.5) !important; }
  .dark .bg-white\/20 { background-color: rgba(30, 41, 59, 0.2) !important; }
  .dark .bg-white\/10 { background-color: rgba(30, 41, 59, 0.1) !important; }
  .dark .bg-gray-50  { background-color: #1e293b !important; }
  .dark .bg-gray-100 { background-color: #334155 !important; }
  .dark .bg-gray-200 { background-color: #475569 !important; }
  /* Improve text contrast */
  .dark .text-gray-600 { color: #cbd5e1 !important; }
  .dark .text-gray-700 { color: #e2e8f0 !important; }
  .dark .text-gray-800 { color: #f1f5f9 !important; }
  .dark .text-gray-900 { color: #ffffff !important; }
  /* Borders/rings */
  .dark .border-gray-200 { border-color: #475569 !important; }
  .dark .border-gray-300 { border-color: #64748b !important; }
  .dark .ring-gray-300   { --tw-ring-color: #64748b !important; }
</style>



<!-- Theme toggle script -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('themeToggleHome');
    const iconEl = document.getElementById('themeIcon');

    function applyTheme(theme) {
      if (theme === 'dark') {
        document.documentElement.classList.add('dark');
        if (iconEl) iconEl.textContent = '☀️';
      } else {
        document.documentElement.classList.remove('dark');
        if (iconEl) iconEl.textContent = '🌙';
      }
    }

    // Load saved theme or default to light
    let saved = localStorage.getItem('theme');
    if (saved !== 'dark' && saved !== 'light') {
      saved = 'light';
    }
    applyTheme(saved);

    // Toggle on click
    toggleBtn?.addEventListener('click', () => {
      const isDark = document.documentElement.classList.toggle('dark');
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
      if (iconEl) iconEl.textContent = isDark ? '☀️' : '🌙';
    });
  });
</script>
@endsection




