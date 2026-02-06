<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IBTU Skin Care</title>

    {{-- PUBLIC CSS ONLY (Railway-safe) --}}
    <link rel="stylesheet" href="/css/style.css?v={{ time() }}">
</head>
<body>

    @include('partials.site-navbar')

    <main>
        @yield('content')
    </main>

</body>
</html>
