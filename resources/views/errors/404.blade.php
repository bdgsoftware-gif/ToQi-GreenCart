@extends('layouts.guest')

@section('title', 'Page Not Found')

@section('content')
    <div class="text-center mt-6">
        <h1 class="text-6xl font-bold text-gray-800">404</h1>

        <p class="mt-4 text-lg text-gray-600">
            Oops! The page you are looking for does not exist.
        </p>

        <p class="mt-2 text-sm text-gray-500">
            It might have been moved or deleted.
        </p>

        <div class="mt-6">
            <a href="{{ url('/') }}"
                class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg
                      hover:bg-blue-700 transition duration-200">
                <i class="fas fa-home mr-2"></i>
                Back to Home
            </a>
        </div>
    </div>
@endsection
