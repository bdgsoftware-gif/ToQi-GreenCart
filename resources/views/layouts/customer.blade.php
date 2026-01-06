<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'My Account | ' . config('app.name'))</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="bg-gray-50">

    @include('components.navbar')

    <div class="container mx-auto px-4 py-6">
        <div class="grid grid-cols-12 gap-6">
            <aside class="col-span-12 md:col-span-3">
                @include('customer.partials.sidebar')
            </aside>

            <main class="col-span-12 md:col-span-9">
                @include('components.flash')
                @yield('content')
            </main>
        </div>
    </div>

    @include('components.footer')
    @stack('scripts')
</body>

</html>
