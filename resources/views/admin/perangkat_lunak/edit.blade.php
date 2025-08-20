@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Perangkat Lunak</h1>
                    <p class="text-gray-600">Perbarui informasi perangkat lunak mahasiswa</p>
                </div>
                <a href="{{ route('perangkatlunak.index') }}" 
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
            <form action="{{ route('perangkatlunak.update', $perangkatlunak->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Perangkat Lunak <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', $perangkatlunak->name) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('name') border-red-500 @enderror"
                           placeholder="Masukkan nama perangkat lunak">
                    @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description Field -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi
                    </label>
                    <textarea id="description" 
                              name="description" 
                              rows="4"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('description') border-red-500 @enderror"
                              placeholder="Masukkan deskripsi perangkat lunak">{{ old('description', $perangkatlunak->description) }}</textarea>
                    @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Repo URL Field -->
                <div>
                    <label for="repo_url" class="block text-sm font-medium text-gray-700 mb-2">
                        URL Repository
                    </label>
                    <input type="url" 
                           id="repo_url" 
                           name="repo_url" 
                           value="{{ old('repo_url', $perangkatlunak->repo_url) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('repo_url') border-red-500 @enderror"
                           placeholder="https://github.com/username/repository">
                    @error('repo_url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Website URL Field -->
                <div>
                    <label for="website_url" class="block text-sm font-medium text-gray-700 mb-2">
                        URL Website
                    </label>
                    <input type="url" 
                           id="website_url" 
                           name="website_url" 
                           value="{{ old('website_url', $perangkatlunak->website_url) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('website_url') border-red-500 @enderror"
                           placeholder="https://contoh-website.com">
                    @error('website_url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Student Field -->
                <div>
                    <label for="student_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Mahasiswa
                    </label>
                    
                    <!-- Student Search Field with Autocomplete -->
                    <div class="mb-3 relative">
                        <div class="relative">
                            <input type="text" 
                                   id="studentSearch" 
                                   placeholder="Cari mahasiswa berdasarkan nama atau program studi..." 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                            <svg class="absolute right-3 top-3 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        
                        <!-- Autocomplete Results Dropdown -->
                        <div id="autocompleteResults" class="absolute z-50 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg max-h-60 overflow-y-auto hidden">
                            <!-- Results will be populated here -->
                        </div>
                    </div>
                    
                    <!-- Hidden Student ID Field -->
                    <input type="hidden" id="student_id" name="student_id" value="{{ old('student_id', $perangkatlunak->student_id) }}">
                    
                    <!-- Selected Student Info -->
                    <div id="selectedStudentInfo" class="mt-2 p-3 bg-blue-50 border border-blue-200 rounded-lg hidden">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-blue-900" id="selectedStudentName"></p>
                                    <p class="text-xs text-blue-700" id="selectedStudentProgram"></p>
                                </div>
                            </div>
                            <button type="button" id="clearStudent" class="text-blue-600 hover:text-blue-800">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    @error('student_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('perangkatlunak.index') }}" 
                       class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-all duration-200">
                        Batal
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-medium rounded-lg shadow-lg hover:from-green-700 hover:to-emerald-700 transform hover:scale-105 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update Perangkat Lunak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.form-group {
    transition: all 0.2s ease-in-out;
}
.form-group:focus-within {
    transform: translateY(-2px);
}

.autocomplete-item {
    padding: 12px 16px;
    cursor: pointer;
    border-bottom: 1px solid #f3f4f6;
    transition: background-color 0.2s;
}

.autocomplete-item:hover {
    background-color: #f9fafb;
}

.autocomplete-item:last-child {
    border-bottom: none;
}

.autocomplete-item.selected {
    background-color: #eff6ff;
    color: #1d4ed8;
}

.student-name {
    font-weight: 500;
    color: #111827;
}

.student-program {
    font-size: 0.875rem;
    color: #6b7280;
    margin-top: 2px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const studentSearch = document.getElementById('studentSearch');
    const studentIdField = document.getElementById('student_id');
    const autocompleteResults = document.getElementById('autocompleteResults');
    const selectedStudentInfo = document.getElementById('selectedStudentInfo');
    const selectedStudentName = document.getElementById('selectedStudentName');
    const selectedStudentProgram = document.getElementById('selectedStudentProgram');
    const clearStudentBtn = document.getElementById('clearStudent');
    
    // Student data from the server
    const students = @json($mahasiswas);
    
    let searchTimeout;
    let selectedIndex = -1;
    
    // Student search functionality with autocomplete
    studentSearch.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        clearTimeout(searchTimeout);
        
        // Clear previous results
        autocompleteResults.innerHTML = '';
        selectedIndex = -1;
        
        if (searchTerm.length < 2) {
            autocompleteResults.classList.add('hidden');
            return;
        }
        
        // Filter students based on search term
        const filteredStudents = students.filter(student => {
            const name = student.name.toLowerCase();
            const program = student.program_study.toLowerCase();
            return name.includes(searchTerm) || program.includes(searchTerm);
        });
        
        if (filteredStudents.length > 0) {
            // Populate autocomplete results
            filteredStudents.forEach((student, index) => {
                const item = document.createElement('div');
                item.className = 'autocomplete-item';
                item.setAttribute('data-student-id', student.id);
                item.setAttribute('data-index', index);
                
                item.innerHTML = `
                    <div class="student-name">${student.name}</div>
                    <div class="student-program">${student.program_study}</div>
                `;
                
                item.addEventListener('click', function() {
                    selectStudent(student);
                });
                
                autocompleteResults.appendChild(item);
            });
            
            autocompleteResults.classList.remove('hidden');
        } else {
            autocompleteResults.classList.add('hidden');
        }
    });
    
    // Handle keyboard navigation
    studentSearch.addEventListener('keydown', function(e) {
        const items = autocompleteResults.querySelectorAll('.autocomplete-item');
        
        if (items.length === 0) return;
        
        switch(e.key) {
            case 'ArrowDown':
                e.preventDefault();
                selectedIndex = Math.min(selectedIndex + 1, items.length - 1);
                updateSelection(items);
                break;
            case 'ArrowUp':
                e.preventDefault();
                selectedIndex = Math.max(selectedIndex - 1, -1);
                updateSelection(items);
                break;
            case 'Enter':
                e.preventDefault();
                if (selectedIndex >= 0 && items[selectedIndex]) {
                    const studentId = items[selectedIndex].getAttribute('data-student-id');
                    const student = students.find(s => s.id == studentId);
                    if (student) {
                        selectStudent(student);
                    }
                }
                break;
            case 'Escape':
                autocompleteResults.classList.add('hidden');
                selectedIndex = -1;
                break;
        }
    });
    
    // Update visual selection
    function updateSelection(items) {
        items.forEach((item, index) => {
            if (index === selectedIndex) {
                item.classList.add('selected');
            } else {
                item.classList.remove('selected');
            }
        });
    }
    
    // Select a student
    function selectStudent(student) {
        studentSearch.value = `${student.name} - ${student.program_study}`;
        studentIdField.value = student.id;
        
        selectedStudentName.textContent = student.name;
        selectedStudentProgram.textContent = student.program_study;
        selectedStudentInfo.classList.remove('hidden');
        
        autocompleteResults.classList.add('hidden');
        selectedIndex = -1;
    }
    
    // Clear selected student
    clearStudentBtn.addEventListener('click', function() {
        studentSearch.value = '';
        studentIdField.value = '';
        selectedStudentInfo.classList.add('hidden');
    });
    
    // Hide autocomplete when clicking outside
    document.addEventListener('click', function(e) {
        if (!studentSearch.contains(e.target) && !autocompleteResults.contains(e.target)) {
            autocompleteResults.classList.add('hidden');
            selectedIndex = -1;
        }
    });
    
    // Initialize selected student info if there's a pre-selected value
    if (studentIdField.value) {
        const student = students.find(s => s.id == studentIdField.value);
        if (student) {
            studentSearch.value = `${student.name} - ${student.program_study}`;
            selectedStudentName.textContent = student.name;
            selectedStudentProgram.textContent = student.program_study;
            selectedStudentInfo.classList.remove('hidden');
        }
    }
    
    // Clear search when form is submitted
    document.querySelector('form').addEventListener('submit', function() {
        studentSearch.value = '';
    });
});
</script>
@endsection
