@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Tambah Perkenalan Baru</h1>
                    <p class="text-gray-600">Isi informasi perkenalan alumni/mahasiswa</p>
                </div>
                <a href="{{ route('perkenalan.index') }}" 
                   class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-medium rounded-lg hover:bg-gray-700 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Form Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
            <form action="{{ route('perkenalan.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('name') border-red-500 @enderror"
                           placeholder="Masukkan nama lengkap">
                    @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Program Study Field -->
                <div>
                    <label for="program_study" class="block text-sm font-medium text-gray-700 mb-2">
                        Program Studi
                    </label>
                    <input type="text"
                           id="program_study"
                           name="program_study"
                           value="{{ old('program_study') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('program_study') border-red-500 @enderror"
                           placeholder="Misal: Teknik Informatika">
                    @error('program_study')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Year of Graduation Field -->
                <div>
                    <label for="year_of_graduation" class="block text-sm font-medium text-gray-700 mb-2">
                        Tahun Lulus
                    </label>
                    <input type="number"
                           id="year_of_graduation"
                           name="year_of_graduation"
                           value="{{ old('year_of_graduation') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('year_of_graduation') border-red-500 @enderror"
                           placeholder="Misal: 2024">
                    @error('year_of_graduation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('email') border-red-500 @enderror"
                           placeholder="nama@email.com">
                    @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone Field -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                        Nomor Telepon
                    </label>
                    <input type="text"
                           id="phone"
                           name="phone"
                           value="{{ old('phone') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('phone') border-red-500 @enderror"
                           placeholder="08xxxxxxxxxx">
                    @error('phone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('perkenalan.index') }}" 
                       class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-all duration-200">
                        Batal
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-lg shadow-lg hover:from-blue-700 hover:to-indigo-700 transform hover:scale-105 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Perkenalan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
