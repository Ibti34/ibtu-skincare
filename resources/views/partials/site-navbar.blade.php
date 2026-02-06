<nav class="site-navbar">

    <div class="navbar-container">

        <!-- LOGO -->
        <div class="logo">
            <a href="{{ url('/') }}">IBTU</a>
        </div>

        <!-- LINKS -->
        <ul class="nav-links">

            <li>
                <a href="{{ url('/') }}">Home</a>
            </li>

            <li>
                <a href="{{ url('/products') }}">Products</a>
            </li>

            <!-- CART -->
            <li class="cart-link">
                <a href="{{ route('cart.index') }}">
                    🛒 Cart

                    @php
                        $cart = session('cart', []);
                        $cartCount = 0;
                        foreach ($cart as $item) {
                            $cartCount += $item['quantity'] ?? 0;
                        }
                    @endphp

                    @if($cartCount > 0)
                        <span class="cart-count">{{ $cartCount }}</span>
                    @endif
                </a>
            </li>

            <li>
                <a href="{{ url('/contact') }}">Contact</a>
            </li>

        </ul>

        <!-- AUTH AREA -->
        <div class="auth-area">

            <img src="{{ asset('images/profile.png') }}" alt="Profile">

            @auth
                <span class="username">{{ auth()->user()->name }}</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="logout-btn">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth

        </div>

    </div>
</nav>
