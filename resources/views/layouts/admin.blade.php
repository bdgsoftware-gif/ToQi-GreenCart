<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Admin | ' . config('app.name'))</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white border-r">
            @include('admin.partials.sidebar')
        </aside>

        {{-- Content --}}
        <div class="flex-1 flex flex-col">
            @include('admin.partials.topbar')

            <main class="p-6">
                @include('components.flash')
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>

</html>
