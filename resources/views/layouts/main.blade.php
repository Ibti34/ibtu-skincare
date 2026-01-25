<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IBTU Skin Care</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Load Vite assets only when a built manifest exists (avoids requiring `npm run dev`) --}}
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>

    @include('partials.site-navbar')

    {{-- ✅ SUCCESS MESSAGE --}}
    @if (session('success'))
        <div class="max-w-7xl mx-auto mt-6 px-6">
            <div class="bg-green-100 border border-green-500 text-green-800 px-4 py-3 rounded shadow">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <main>
        @yield('content')
    </main>

</body>

</html>
