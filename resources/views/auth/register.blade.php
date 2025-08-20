@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Register</h2>
        <p class="text-gray-600 dark:text-gray-400">This is a placeholder for the registration page.</p>
        <a href="{{ route('dashboard.index') }}" class="mt-4 inline-block text-indigo-600 hover:underline">Back to Login</a>
    </div>
</div>
@endsection
