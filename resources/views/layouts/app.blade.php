<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Penjualan Dimsum') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Custom CSS -->
</head>

<body>
    <div id="app">
        @auth
        <div class="sidebar">
            <img src="{{ asset('img/dimsum.png') }}" alt="Eat Dimsum Logo">
            @if (request()->is('sales*'))
            <a href="{{ url('/sales') }}">Dashboard</a>
            <a href="{{ url('/sales/create') }}">Tambah Penjualan</a>
            @endif
            @if (request()->is('products*'))
            <a href="{{ url('/products/sales') }}">Dashboard</a>
            <a href="{{ url('/products') }}">Daftar Produk</a>
            <a href="{{ url('/products/create') }}">Tambah Produk</a>
            @endif
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        @endauth

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>