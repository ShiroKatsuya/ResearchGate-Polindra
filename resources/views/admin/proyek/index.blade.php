@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Enhanced Navigation Section -->
        @include('navigation_proyek')
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Manajemen Proyek</h1>
                    <p class="text-gray-600">Kelola data proyek penelitian mahasiswa</p>
                </div>
                <a href="{{ route('proyek.create') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-lg shadow-lg hover:from-blue-700 hover:to-indigo-700 transform hover:scale-105 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Proyek
                </a>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg animate-fade-in">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                {{ session('success') }}
            </div>
        </div>
        @endif

        <!-- Search and Filter Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
            <form method="GET" action="{{ route('proyek.index') }}" id="searchForm" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
                    <div class="relative">
                        <input type="text" 
                               name="search"
                               id="searchInput"
                               value="{{ request('search') }}"
                               placeholder="Search" 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                        <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <div id="searchSpinner" class="absolute right-3 top-2.5 hidden">
                            <svg class="animate-spin h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="relative">
                        <select name="status" id="statusSelect" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                            <option value="">Semua Status</option>
                            @foreach($statuses as $status)
                            <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative hidden">
                        <input type="text"
                               name="student_name"
                               id="studentNameInput"
                               value="{{ request('student_name') }}"
                               placeholder="Cari nama mahasiswa..."
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                    </div>
                    <div class="relative hidden">
                        <input type="number"
                               name="year"w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200
                               id="yearInput"
                               min="1900"
                               max="2100"
                               step="1"
                               value="{{ request('year') }}"
                               placeholder="Tahun (YYYY)"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                    </div>
                    <div class="relative">
                        <input type="date" 
                               name="start_date"
                               id="startDateInput"
                               value="{{ request('start_date') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                               placeholder="Tanggal Mulai">
                    </div>
                    <div class="relative">
                        <input type="date" 
                               name="end_date"
                               id="endDateInput"
                               value="{{ request('end_date') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                               placeholder="Tanggal Selesai">
                    </div>
                </div>
                <div class="flex space-x-2 mt-4">
                    <button type="submit" 
                            id="searchBtn"
                            class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-all duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Cari
                    </button>
                    @if(request('search') || request('status') || request('start_date') || request('end_date'))
                    <a href="{{ route('proyek.index') }}" 
                       class="px-6 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-all duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Reset
                    </a>
                    @endif
                </div>
            </form>

            @if(request('search') || request('status') || request('start_date') || request('end_date'))
            <div class="mt-4 pt-4 border-t border-gray-200">
                <div class="flex items-center flex-wrap gap-2">
                    <span class="text-sm font-medium text-gray-700">Filter Aktif:</span>
                    @if(request('search'))
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Pencarian: "{{ request('search') }}"
                    </span>
                    @endif
                    @if(request('status'))
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Status: {{ ucfirst(request('status')) }}
                    </span>
                    @endif
                    @if(request('student_name'))
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-pink-100 text-pink-800">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4 4 0 017 17h10a4 4 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Nama: "{{ request('student_name') }}"
                    </span>
                    @endif
                    @if(request('year'))
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-indigo-100 text-indigo-800">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Tahun: {{ request('year') }}
                    </span>
                    @endif
                    @if(request('start_date'))
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-purple-100 text-purple-800">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Mulai: {{ \Carbon\Carbon::parse(request('start_date'))->format('d M Y') }}
                    </span>
                    @endif
                    @if(request('end_date'))
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-yellow-100 text-yellow-800">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Selesai: {{ \Carbon\Carbon::parse(request('end_date'))->format('d M Y') }}
                    </span>
                    @endif
                </div>
            </div>
            @endif
        </div>

        @if(request('search') || request('status') || request('start_date') || request('end_date'))
        <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span class="text-blue-800 font-medium">
                        Hasil Pencarian: {{ $proyeks->total() }} proyek ditemukan
                    </span>
                </div>
                <a href="{{ route('proyek.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    Lihat Semua Proyek
                </a>
            </div>
        </div>
        @endif

        <!-- Data Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-4 md:mb-0">
            <div class="overflow-x-auto mb-4 md:mb-0">
                <table class="min-w-full divide-y divide-gray-200 mb-4 md:mb-0">
                    <thead class="bg-gray-50 hidden md:table-header-group">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Proyek
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Mahasiswa
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Mulai
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Selesai
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($proyeks as $proyek)
                        <tr class="hover:bg-gray-50 transition-colors duration-150 flex flex-col md:table-row md:flex-row w-full md:w-auto">
                            <td class="px-6 py-4 flex flex-col md:table-cell" data-label="Proyek">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-lg flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $proyek->title }}</div>
                                        @if($proyek->repository_url)
                                        <div class="text-sm text-gray-500 break-all">Repo: <a href="{{ $proyek->repository_url }}" target="_blank" class="text-blue-600 hover:underline">{{ $proyek->repository_url }}</a></div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 flex flex-col md:table-cell" data-label="Mahasiswa">
                                <div class="text-sm text-gray-900">
                                    {{ $proyek->student ? $proyek->student->name : '-' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 flex flex-col md:table-cell" data-label="Tanggal Mulai">
                                <div class="text-sm text-gray-900">
                                    {{ $proyek->start_date ? \Carbon\Carbon::parse($proyek->start_date)->format('d M Y') : '-' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 flex flex-col md:table-cell" data-label="Tanggal Selesai">
                                <div class="text-sm text-gray-900">
                                    {{ $proyek->end_date ? \Carbon\Carbon::parse($proyek->end_date)->format('d M Y') : '-' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 flex flex-col md:table-cell" data-label="Status">
                                @php
                                    $statusColors = [
                                        'berjalan' => 'bg-yellow-100 text-yellow-800',
                                        'selesai' => 'bg-green-100 text-green-800',
                                        'tertunda' => 'bg-red-100 text-red-800',
                                    ];
                                    $status = $proyek->status ?? 'berjalan';
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$status] ?? 'bg-gray-100 text-gray-800' }}">
                                    <svg class="w-2 h-2 mr-1.5 {{ $status == 'selesai' ? 'text-green-400' : ($status == 'berjalan' ? 'text-yellow-400' : 'text-red-400') }}" fill="currentColor" viewBox="0 0 8 8">
                                        <circle cx="4" cy="4" r="3"></circle>
                                    </svg>
                                    {{ ucfirst($status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right text-sm font-medium flex flex-col md:table-cell" data-label="Aksi">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('proyek.edit', $proyek->id) }}" 
                                       class="text-indigo-600 hover:text-indigo-900 p-2 rounded-lg hover:bg-indigo-50 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <button type="button" 
                                            onclick="openDeleteModal({{ $proyek->id }}, '{{ addslashes($proyek->title) }}')"
                                            class="text-red-600 hover:text-red-900 p-2 rounded-lg hover:bg-red-50 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr class="flex flex-col md:table-row md:flex-row w-full md:w-auto">
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="text-gray-500">
                                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    <p class="text-lg font-medium">
                                        @if(request('search') || request('status') || request('start_date') || request('end_date'))
                                            Tidak ada hasil yang ditemukan
                                        @else
                                            Belum ada proyek
                                        @endif
                                    </p>
                                    <p class="text-sm">
                                        @if(request('search') || request('status') || request('start_date') || request('end_date'))
                                            Coba ubah filter pencarian Anda
                                        @else
                                            Mulai dengan menambahkan proyek pertama Anda
                                        @endif
                                    </p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($proyeks->hasPages())
            <div class="bg-white px-6 py-6 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center text-sm text-gray-600">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <span>
                            Showing <span class="font-semibold text-gray-900">{{ $proyeks->firstItem() }}</span> to <span class="font-semibold text-gray-900">{{ $proyeks->lastItem() }}</span> of <span class="font-semibold text-gray-900">{{ $proyeks->total() }}</span> results
                        </span>
                    </div>

                    <div class="flex items-center space-x-1">
                        @if($proyeks->onFirstPage())
                        <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Previous
                        </span>
                        @else
                        <a href="{{ $proyeks->previousPageUrl() }}" 
                           class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Previous
                        </a>
                        @endif

                        <div class="flex items-center space-x-1">
                            @foreach($proyeks->getUrlRange(1, $proyeks->lastPage()) as $page => $url)
                                @if($page == $proyeks->currentPage())
                                <span class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-blue-600 border border-blue-600 rounded-lg">
                                    {{ $page }}
                                </span>
                                @elseif($page == 1 || $page == $proyeks->lastPage() || ($page >= $proyeks->currentPage() - 1 && $page <= $proyeks->currentPage() + 1))
                                <a href="{{ $url }}" 
                                   class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                                    {{ $page }}
                                </a>
                                @elseif($page == $proyeks->currentPage() - 2 || $page == $proyeks->currentPage() + 2)
                                <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-400">
                                    ...
                                </span>
                                @endif
                            @endforeach
                        </div>

                        @if($proyeks->hasMorePages())
                        <a href="{{ $proyeks->nextPageUrl() }}" 
                           class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                            Next
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        @else
                        <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                            Next
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </span>
                        @endif
                    </div>

                    <div class="flex sm:hidden items-center space-x-2">
                        @if($proyeks->onFirstPage())
                        <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </span>
                        @else
                        <a href="{{ $proyeks->previousPageUrl() }}" 
                           class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </a>
                        @endif
                        
                        <span class="text-sm text-gray-600">
                            Page {{ $proyeks->currentPage() }} of {{ $proyeks->lastPage() }}
                        </span>
                        
                        @if($proyeks->hasMorePages())
                        <a href="{{ $proyeks->nextPageUrl() }}" 
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
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeDeleteModal()"></div>
        <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl ring-1 ring-gray-900/5 w-full sm:max-w-lg transition-all duration-300 scale-95 opacity-0" id="modalContent">
            <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 py-6 text-white">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 id="modal-title" class="text-xl font-semibold">Konfirmasi Hapus</h3>
                        <p class="text-red-100 text-sm">Tindakan ini tidak dapat dibatalkan</p>
                    </div>
                </div>
            </div>
            <div class="px-6 py-6 space-y-4">
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-900 font-medium">Anda yakin ingin menghapus proyek ini?</p>
                        <p class="text-gray-600 text-sm mt-1" id="deleteItemTitle"></p>
                    </div>
                </div>
                <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                        <div>
                            <p class="text-red-800 text-sm font-medium">Perhatian</p>
                            <p class="text-red-700 text-sm mt-1">Data yang dihapus tidak dapat dipulihkan. Pastikan Anda telah memilih proyek yang benar.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-4 flex justify-end space-x-3">
                <button type="button" 
                        onclick="closeDeleteModal()"
                        class="px-4 py-2 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200">
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-4 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Hapus Proyek
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@include('style')
@endsection