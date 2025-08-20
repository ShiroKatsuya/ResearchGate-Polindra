
@extends('layouts.app')

@section('content')
<div 
    x-data="{ sidebarOpen: false }" 
    class="flex flex-col lg:flex-row gap-0 min-h-[70vh] relative"
>
    <!-- Sidebar -->
   

    <!-- Overlay for mobile -->
    <div 
        class="fixed inset-0 z-20 bg-black/30 backdrop-blur-sm transition-opacity duration-200 lg:hidden"
        x-show="sidebarOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="sidebarOpen = false"
        x-cloak
    ></div>

    <!-- Main Content Area -->
    <div class="flex-1 min-w-0  w-full">
        <!-- Header -->
        {{-- <div class="flex items-center justify-between px-4 py-6 border-b border-gray-100 bg-white sticky top-0 z-10">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 tracking-tight">Dashboard Konten</h1>
                <p class="text-sm text-gray-500 mt-1">Pusat navigasi untuk mengelola modul riset & informasi</p>
            </div>
            <div>
                <!-- If not logged in, show login button. If logged in, show user icon. For now, always show login. -->
                <a href="{{ route('dashboard.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-primary-600 text-white font-semibold shadow hover:bg-primary-700 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <svg class="h-5 w-5 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="text-black">Login</span>
                </a>
            </div>
            <!-- Hamburger for mobile -->
            <button 
                class="lg:hidden ml-4 p-2 rounded-md hover:bg-gray-100 transition"
                @click="sidebarOpen = true"
                aria-label="Buka Menu Navigasi"
            >
                <svg class="h-6 w-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div> --}}

        <!-- Main Welcome & Cards -->
        <div class="p-6 md:p-10 bg-gray-50 min-h-[60vh]">
            <div class="mb-8">
                <h2 class="text-3xl md:text-4xl font-extrabold text-primary-700 mb-2">Selamat Datang di Dashboard</h2>
                <p class="text-lg text-gray-600">Kelola seluruh modul riset, perangkat lunak, dan informasi dengan mudah dari satu tempat.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                <!-- Card: Publikasi Riset -->
                <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col justify-between card-hover transition-all duration-200">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <div class="bg-primary-100 text-primary-700 rounded-lg p-2">
                                <!-- SVG: Publication/Research Paper Icon -->
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <rect x="4" y="3" width="16" height="18" rx="2" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h8M8 11h8M8 15h4" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Publikasi Riset</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Kelola dan unggah publikasi hasil riset mahasiswa dan dosen.</p>
                    </div>
                    <div class="flex justify-center">
                        <a href="{{ route('publikasi.index') }}" class="mt-2 inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-primary-600 text-white font-medium shadow hover:bg-primary-700 transition-all duration-200">
                            <span class="text-black">Kelola Sekarang</span>
                            <svg class="h-4 w-4 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- Card: Proyek Riset -->
                <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col justify-between card-hover transition-all duration-200">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <div class="bg-primary-100 text-primary-700 rounded-lg p-2">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 3v4M8 3v4M4 11h16" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Proyek Riset</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Atur dan dokumentasikan proyek riset yang sedang berjalan maupun selesai.</p>
                    </div>
                    <div class="flex justify-center">
                    <a href="{{ route('proyek.index') }}" class="mt-2 flex justify-center items-center gap-2 px-4 py-2 rounded-lg bg-primary-600 text-white font-medium shadow hover:bg-primary-700 transition-all duration-200">
                        <span class="text-black">Kelola Sekarang</span>
                        <svg class="h-4 w-4 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                    </div>
                </div>
                <!-- Card: Perangkat Lunak -->
                <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col justify-between card-hover transition-all duration-200">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <div class="bg-primary-100 text-primary-700 rounded-lg p-2">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <rect x="4" y="4" width="16" height="16" rx="2" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 8h8v8H8z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Perangkat Lunak</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Kelola aplikasi dan perangkat lunak hasil karya mahasiswa dan dosen.</p>
                    </div>
                    <div class="flex justify-center">
                    <a href="{{ route('perangkatlunak.index') }}" class="mt-2 flex justify-center items-center gap-2 px-4 py-2 rounded-lg bg-primary-600 text-white font-medium shadow hover:bg-primary-700 transition-all duration-200">
                        <span class="text-black flex items-center justify-center">Kelola Sekarang</span>
                        <svg class="h-4 w-4 text-black flex items-center justify-center" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
                </div>
                <!-- Card: Perkenalan -->
                <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col justify-between card-hover transition-all duration-200">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <div class="bg-primary-100 text-primary-700 rounded-lg p-2">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="7" r="4" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.5 21a7.5 7.5 0 0113 0" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-black">Perkenalan</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Perbarui informasi pengenalan jurusan, dosen, dan mahasiswa.</p>
                    </div>
                    <div class="flex justify-center">
                    <a href="{{ route('perkenalan.index') }}" class="mt-2 inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-primary-600 text-white font-medium shadow hover:bg-primary-700 transition-all duration-200">
                        <span class="text-black flex items-center justify-center w-full">Kelola Sekarang</span>
                        <svg class="h-4 w-4 text-black flex items-center justify-center" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
                </div>
                <!-- Card: Berita -->
                <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col justify-between card-hover transition-all duration-200">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <div class="bg-primary-100 text-primary-700 rounded-lg p-2">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h6" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Berita</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Kelola berita dan pengumuman terbaru seputar jurusan dan kampus.</p>
                    </div>
                    <div class="flex justify-center">
                    <a href="{{ route('berita.index') }}" class="mt-2 flex justify-center items-center gap-2 px-4 py-2 rounded-lg bg-primary-600 text-white font-medium shadow hover:bg-primary-700 transition-all duration-200">
                        <span class="text-black flex items-center justify-center w-full">Kelola Sekarang </span>
                        <svg class="h-4 w-4 text-black flex items-center justify-center" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                    </div>
                </div>

                <!-- Card: Mahasiswa -->
                <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col justify-between card-hover transition-all duration-200">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <div class="bg-primary-100 text-primary-700 rounded-lg p-2">
                                <!-- Changed SVG to something more related to students: graduation cap -->
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3L2 9l10 6 10-6-10-6z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-6" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 16.5V12.5l5 3 5-3v4" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Mahasiswa</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Kelola data mahasiswa jurusan dan kampus.</p>
                    </div>
                    <div class="flex justify-center">
                    <a href="{{ route('student.index') }}" class="mt-2 flex justify-center items-center gap-2 px-4 py-2 rounded-lg bg-primary-600 text-white font-medium shadow hover:bg-primary-700 transition-all duration-200">
                        <span class="text-black flex items-center justify-center w-full">Kelola Sekarang </span>
                        <svg class="h-4 w-4 text-black flex items-center justify-center" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
