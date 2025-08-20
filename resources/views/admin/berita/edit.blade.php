@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Berita</h1>
                    <p class="text-gray-600">Perbarui informasi data berita</p>
                </div>
                <a href="{{ route('berita.index') }}" 
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
            <form action="{{ route('berita.update', $berita->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <!-- Title Field -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Judul <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $berita->title) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('title') border-red-500 @enderror"
                           placeholder="Masukkan judul berita">
                    @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content Field -->
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                        Konten <span class="text-red-500">*</span>
                    </label>
                    <textarea id="content"
                              name="content"
                              rows="6"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('content') border-red-500 @enderror"
                              placeholder="Tulis konten berita">{{ old('content', $berita->content) }}</textarea>
                    @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category Field -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Kategori (opsional)
                    </label>
                    <select id="category_id"
                            name="category_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('category_id') border-red-500 @enderror">
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ (string) old('category_id', $berita->category_id) === (string) $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Published At Field -->
                <div>
                    <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Publikasi (opsional)
                    </label>
                    <input type="date"
                           id="published_at"
                           name="published_at"
                           value="{{ old('published_at', optional($berita->published_at)->format('Y-m-d')) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('published_at') border-red-500 @enderror"
                           placeholder="Pilih tanggal publikasi">
                    @error('published_at')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug Field -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                        Slug (opsional)
                    </label>
                    <input type="text"
                           id="slug"
                           name="slug"
                           value="{{ old('slug', $berita->slug) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('slug') border-red-500 @enderror"
                           placeholder="Masukkan slug">
                    @error('slug')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('berita.index') }}" 
                       class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-all duration-200">
                        Batal
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-medium rounded-lg shadow-lg hover:from-green-700 hover:to-emerald-700 transform hover:scale-105 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update Berita
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
