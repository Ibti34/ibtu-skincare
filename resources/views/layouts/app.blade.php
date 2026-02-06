<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IBTU Skin Care</title>

    {{-- ✅ NORMAL CSS ONLY --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v=3">
</head>
<body>

    {{-- NAVBAR --}}
    @include('partials.site-navbar')

    {{-- OPTIONAL PAGE HEADER --}}
    @isset($header)
        <header class="page-header">
            <div class="container">
                {{ $header }}
            </div>
        </header>
    @endisset

    {{-- PAGE CONTENT --}}
    <main class="main-content">
        @yield('content')
    </main>

</body>
</html>
