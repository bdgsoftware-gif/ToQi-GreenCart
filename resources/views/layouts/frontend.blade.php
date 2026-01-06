<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="is-auth" content="{{ auth()->check() ? '1' : '0' }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="min-h-screen bg-gray-50">

    @include('components.navbar')

    <main class="container mx-auto px-4 py-6">
        @include('components.flash')
        @yield('content')
    </main>

    @include('components.footer')

    @stack('scripts')
</body>

</html>
