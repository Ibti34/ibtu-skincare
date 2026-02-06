<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IBTU Skin Care</title>

    {{-- ✅ ONLY public CSS --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}?v=6">

</head>
<body>

    @include('partials.site-navbar')

    {{-- ✅ SUCCESS MESSAGE --}}
    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <main>
        @yield('content')
    </main>

</body>
</html>
