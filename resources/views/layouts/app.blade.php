<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Cacam Furniture') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <style>
            body { background: #fff; font-family: 'Nunito', Arial, sans-serif; }
            .tokopedia-green { background: #6c757d !important; color: #fff !important; }
            .tokopedia-search { border-radius: 24px; border: none; padding-left: 1.2rem; }
            .tokopedia-navbar { box-shadow: 0 2px 8px 0 rgba(0,0,0,0.04); background: #6c757d !important; }
            .tokopedia-navbar .nav-link, .tokopedia-navbar .navbar-brand { color: #fff !important; }
            .tokopedia-navbar .nav-link:hover { color: #e0e0e0 !important; }
            .tokopedia-navbar .btn { border-radius: 20px; }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @if(Auth::check() && Auth::user()->role === 'admin' && request()->is('admin*'))
            @include('layouts.admin_nav')
        @else
            @include('layouts.navigation')
        @endif
        <main class="pt-4">
            @yield('content')
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
