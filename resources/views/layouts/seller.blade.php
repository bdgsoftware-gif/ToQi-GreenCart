<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Seller | ' . config('app.name'))</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">
        <aside class="w-60 bg-white border-r">
            @include('seller.partials.sidebar')
        </aside>

        <div class="flex-1">
            @include('seller.partials.topbar')

            <main class="p-6">
                @include('components.flash')
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>

</html>
