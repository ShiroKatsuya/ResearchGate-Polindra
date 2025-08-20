@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-green-50/30 to-emerald-50/30">
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-r from-green-600 via-green-700 to-emerald-800 rounded-3xl mb-8">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
        
        <div class="relative px-6 py-12 sm:px-8 sm:py-16">
            <div class="mx-auto max-w-4xl text-center">
                <div class="flex items-center justify-center mb-6">
                    <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                        </svg>
                    </div>
                    <div class="text-left">
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-2">Proyek Mahasiswa</h1>
                        {{-- <p class="text-green-100 text-lg sm:text-xl">Karya inovatif dan penelitian mahasiswa Polindra</p> --}}
                    </div>
                </div>
                
            @if(method_exists($projects, 'total'))
                <div class="inline-flex items-center gap-3 bg-white/20 backdrop-blur-sm rounded-2xl px-6 py-3 text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                    </svg>
                    <span class="font-semibold">{{ number_format($projects->total()) }}</span>
                    <span class="text-green-100">proyek tersedia</span>
                </div>
            @endif
        </div>
        </div>
    </div>

    <!-- Enhanced Search & Filter Section -->
    <div class="mb-8">
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl border border-white/20 shadow-xl p-6">
            <form method="get" class="space-y-4">
                <div class="grid grid-cols-1 lg:grid-cols-6 gap-4">
                    <div class="lg:col-span-3 relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-green-500 transition-colors duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.3-4.3M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16Z"/>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="q" 
                            value="{{ $search }}" 
                            placeholder="Cari judul, deskripsi, atau teknologi..." 
                            class="w-full pl-12 pr-4 py-4 rounded-xl border border-gray-200 bg-white/50 backdrop-blur-sm text-gray-900 placeholder-gray-500 shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500/50 focus:border-green-500 transition-all duration-200 hover:bg-white/70"
                            autocomplete="off"
                        />
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        </div>
                    </div>
                    
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-green-500 transition-colors duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
        </div>
                        <select 
                            name="status" 
                            class="w-full pl-12 pr-10 py-4 appearance-none rounded-xl border border-gray-200 bg-white/50 backdrop-blur-sm text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500/50 focus:border-green-500 transition-all duration-200 hover:bg-white/70"
                        >
                <option value="">Seluruh</option>
                @foreach(['berjalan'=>'Berjalan','selesai'=>'Selesai','tertunda'=>'Tertunda'] as $val=>$label)
                    <option value="{{ $val }}" @selected($status===$val)>{{ $label }}</option>
                @endforeach
            </select>
                        {{-- <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                            </svg>
                        </div> --}}
                    </div>
                    
                    <div class="lg:col-span-2 flex gap-3">
                        <button 
                            type="submit" 
                            class="flex-1 inline-flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-green-600 to-green-700 px-6 py-4 text-white font-semibold shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Terapkan Filter
                        </button>
                        
                        <button 
                            type="button" 
                            data-open-modal="proj-help-modal" 
                            class="inline-flex items-center gap-2 rounded-xl ring-1 ring-gray-300 bg-white/80 backdrop-blur-sm px-4 py-4 text-gray-700 hover:text-green-700 hover:ring-green-300 hover:bg-green-50/50 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                            data-tooltip="Tips filter"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="hidden sm:inline">Bantuan</span>
                        </button>
                    </div>
                </div>
                
                @if($search || $status)
                <div class="flex items-center gap-3 text-sm text-gray-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <span>Filter aktif:</span>
                    @if($search)
                        <span class="inline-flex items-center gap-1 bg-green-50 text-green-700 px-2 py-1 rounded-full text-xs">
                            Pencarian: "{{ $search }}"
                            <button type="button" onclick="document.querySelector('input[name=q]').value=''; this.closest('form').submit();" class="text-green-600 hover:text-green-800">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </span>
                    @endif
                    @if($status)
                        <span class="inline-flex items-center gap-1 bg-blue-50 text-blue-700 px-2 py-1 rounded-full text-xs">
                            Status: {{ ucfirst($status) }}
                            <button type="button" onclick="document.querySelector('select[name=status]').value=''; this.closest('form').submit();" class="text-blue-600 hover:text-blue-800">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                            </button>
            </span>
                    @endif
                    <a href="{{ route('research.projects') }}" class="text-green-600 hover:text-green-700 underline">Hapus semua filter</a>
                </div>
                @endif
            </form>
        </div>
        </div>

    <!-- Projects Grid -->
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse($projects as $project)
            <article class="reveal-on-scroll group bg-white/80 backdrop-blur-sm rounded-2xl border border-white/20 shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all duration-500 overflow-hidden">
                <div class="p-6">
                    <!-- Header -->
                    <div class="flex items-start justify-between gap-3 mb-4">
                        <div class="flex-1 min-w-0">
                            <h2 class="text-lg font-bold text-gray-900 line-clamp-2 group-hover:text-green-700 transition-colors duration-200">
                                {{ $project->title }}
                            </h2>
                        </div>
                        
                        <div class="shrink-0">
                            @php
                                $statusColors = [
                                    'berjalan' => 'bg-blue-100 text-blue-700 border-blue-200',
                                    'selesai' => 'bg-green-100 text-green-700 border-green-200',
                                    'tertunda' => 'bg-yellow-100 text-yellow-700 border-yellow-200'
                                ];
                                $statusColor = $statusColors[$project->status] ?? 'bg-gray-100 text-gray-700 border-gray-200';
                            @endphp
                            <span class="inline-flex items-center gap-1.5 rounded-full border px-3 py-1.5 text-xs font-semibold {{ $statusColor }}">
                                @if($project->status === 'berjalan')
                                    <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                                @elseif($project->status === 'selesai')
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                @elseif($project->status === 'tertunda')
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                @endif
                                {{ ucfirst($project->status) }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Metadata -->
                    <div class="mb-4 space-y-2">
                        @if($project->start_date)
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                            </svg>
                            <span>Mulai: {{ \Carbon\Carbon::parse($project->start_date)->format('d M Y') }}</span>
                        </div>
                        @endif
                        
                            @if($project->student)
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                            </svg>
                            <span>{{ $project->student->name }}</span>
                        </div>
                            @endif
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <p class="text-gray-700 leading-relaxed text-sm">{{ Str::limit($project->description, 120) }}</p>
                        @if(strlen($project->description) > 120)
                        <button class="mt-2 text-green-600 hover:text-green-700 font-medium text-xs hover:underline transition-colors duration-200">
                            Baca selengkapnya...
                        </button>
                        @endif
                </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap items-center gap-2">
                        @if($project->repository_url)
                        <div class="flex items-center gap-2">
                            <a 
                                href="{{ $project->repository_url }}" 
                                target="_blank" 
                                rel="noopener" 
                                class="inline-flex items-center gap-2 rounded-xl bg-blue-50 text-blue-700 px-3 py-2 text-xs font-medium hover:bg-blue-100 hover:scale-105 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                data-tooltip="Buka repository di tab baru"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                Repository
                            </a>
                            
                            <button 
                                type="button" 
                                class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-blue-700 text-white px-3 py-2 text-xs font-medium shadow-md hover:shadow-lg hover:scale-105 active:scale-95 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" 
                                data-copy="{{ $project->repository_url }}" 
                                data-tooltip="Salin URL repository"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                                Salin URL
                            </button>
                        </div>
                    @endif
                        
                        <button 
                            type="button" 
                            class="inline-flex items-center gap-2 rounded-xl bg-gray-50 text-gray-700 px-3 py-2 text-xs font-medium hover:bg-gray-100 hover:scale-105 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                            data-tooltip="Bagikan proyek ini"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                            </svg>
                            Bagikan
                        </button>
                    </div>
                </div>
                
                <!-- Hover Effect Border -->
                <div class="h-1 bg-gradient-to-r from-green-500 via-blue-500 to-emerald-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
            </article>
        @empty
            <div class="md:col-span-2 lg:col-span-3 text-center py-16">
                <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gray-100 flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum ada proyek</h3>
                <p class="text-gray-600 mb-6">Saat ini belum ada data proyek yang tersedia.</p>
                @if($search || $status)
                <a href="{{ route('research.projects') }}" class="inline-flex items-center gap-2 rounded-xl bg-green-600 text-white px-6 py-3 font-medium hover:bg-green-700 transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Lihat semua proyek
                </a>
                @endif
            </div>
        @endforelse
    </div>

    <!-- Enhanced Pagination -->
    @if(method_exists($projects, 'withQueryString') && $projects->hasPages())
    <div class="mt-12 pt-8 border-t border-gray-200/50">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex items-center text-sm text-gray-600">
                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                <span>
                    Menampilkan <span class="font-semibold text-gray-900">{{ $projects->firstItem() ?? 0 }}</span>
                    -
                    <span class="font-semibold text-gray-900">{{ $projects->lastItem() ?? 0 }}</span>
                    dari
                    <span class="font-semibold text-gray-900">{{ $projects->total() }}</span>
                    Proyek
                </span>
            </div>
            <div class="flex items-center space-x-1">
                @if($projects->onFirstPage())
                <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Sebelumnya
                </span>
                @else
                <a href="{{ $projects->previousPageUrl() }}" 
                   class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Sebelumnya
                </a>
                @endif

                <div class="flex items-center space-x-1">
                    @foreach($projects->getUrlRange(1, $projects->lastPage()) as $page => $url)
                        @if($page == $projects->currentPage())
                        <span class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-black bg-white shadow border border-gray-300 rounded-lg">
                            {{ $page }}
                        </span>
                        @elseif($page == 1 || $page == $projects->lastPage() || ($page >= $projects->currentPage() - 1 && $page <= $projects->currentPage() + 1))
                        <a href="{{ $url }}" 
                           class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-black bg-white shadow border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-black transition-all duration-200">
                            {{ $page }}
                        </a>
                        @elseif($page == $projects->currentPage() - 2 || $page == $projects->currentPage() + 2)
                        <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-400">
                            ...
                        </span>
                        @endif
                    @endforeach
                </div>

                @if($projects->hasMorePages())
                <a href="{{ $projects->nextPageUrl() }}" 
                   class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                    Berikutnya
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
                @else
                <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                    Berikutnya
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </span>
                @endif
            </div>

            <div class="flex md:hidden items-center space-x-2">
                @if($projects->onFirstPage())
                <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </span>
                @else
                <a href="{{ $projects->previousPageUrl() }}" 
                   class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                @endif
                
                <span class="text-sm text-gray-600">
                    Halaman {{ $projects->currentPage() }} dari {{ $projects->lastPage() }}
                </span>
                
                @if($projects->hasMorePages())
                <a href="{{ $projects->nextPageUrl() }}" 
                   class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
                @else
                <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </span>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Enhanced Help Modal -->
<div id="proj-help-modal" class="fixed inset-0 z-50 hidden" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity duration-300" @click="$dispatch('close-modal')"></div>
        
        <!-- Modal Content -->
        <div class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl ring-1 ring-gray-900/5 w-full sm:max-w-2xl transition-all duration-300 scale-95 opacity-0" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
            <!-- Header -->
            <div class="bg-gradient-to-r from-green-600 to-green-700 px-8 py-8 text-white">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold">Tips Filter Proyek</h3>
                        <p class="text-green-100 text-lg">Cara menemukan proyek dengan cepat</p>
                    </div>
                </div>
            </div>
            
            <!-- Content -->
            <div class="px-8 py-8 space-y-6">
                <div class="grid gap-6">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-2">Pencarian Kata Kunci</h4>
                            <p class="text-gray-600">Gunakan pencarian judul atau deskripsi untuk mempersempit hasil. Ketik kata kunci yang relevan dengan teknologi atau topik yang Anda cari.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-2">Filter Status</h4>
                            <p class="text-gray-600">Pilih status proyek untuk melihat hanya proyek yang relevan: Berjalan, Selesai, atau Tertunda.</p>
                        </div>
    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-purple-100 flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-2">Informasi Penulis</h4>
                            <p class="text-gray-600">Setiap proyek menampilkan informasi mahasiswa yang berkontribusi, sehingga Anda dapat melihat karya dari orang tertentu.</p>
                        </div>
          </div>
          </div>
                
                <div class="bg-green-50 rounded-2xl p-6">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-green-900 mb-1">Pro Tip</h4>
                            <p class="text-green-800 text-sm">Kombinasikan pencarian kata kunci dengan filter status untuk mendapatkan hasil yang lebih spesifik dan relevan dengan kebutuhan Anda.</p>
          </div>
        </div>
      </div>
    </div>

            <!-- Footer -->
            <div class="bg-gray-50 px-8 py-6 flex justify-end">
                <button 
                    @click="$dispatch('close-modal')" 
                    class="inline-flex items-center gap-2 rounded-xl bg-white px-6 py-3 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-gray-300 hover:bg-gray-50 hover:ring-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200"
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


