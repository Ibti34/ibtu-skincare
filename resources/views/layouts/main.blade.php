<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IBTU Skin Care</title>

    {{-- Your old CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- If you used Bootstrap, uncomment this --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>

    {{-- NAVBAR --}}
    @include('partials.site-navbar')


    {{-- PAGE CONTENT --}}
    <main>
        @yield('content')
    </main>

</body>
</html>
