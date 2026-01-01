<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IBTU Skin Care</title>

    {{-- Your CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar">
        <div class="logo">
            <a href="{{ url('/') }}">IBTU Skin Care</a>
        </div>

        <ul class="nav-links">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('products.index') }}">Products</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>

            {{-- ✅ Cart Link with live count --}}
            <li>
                <a href="{{ route('cart.index') }}">
                    🛒 Cart
                    @if(session('cart') && count(session('cart')) > 0)
                        <span class="cart-count">
                            {{ array_sum(array_column(session('cart'), 'quantity')) }}
                        </span>
                    @endif
                </a>
            </li>

            {{-- Optional: Auth Links --}}
            @auth
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endauth
        </ul>
    </nav>

    {{-- PAGE CONTENT --}}
    <main>
        @yield('content')
    </main>

</body>
</html>
