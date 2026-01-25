<nav class="navbar site-navbar bg-white shadow">

    {{-- Inline fallback styles so navbar works when Tailwind/Vite isn't loaded --}}
    <style>
        .site-navbar { width: 100%; box-shadow: 0 4px 12px rgba(0,0,0,0.06); position: fixed; top: 0; left: 0; right: 0; z-index: 9999; background: white; }
        .site-navbar .container { max-width: 1100px; margin: 0 auto; padding: 16px 24px; display: flex; align-items: center; justify-content: space-between; }
        .site-navbar .logo { font-size: 20px; font-weight: 700; color: #2f5d3a; }
        .site-navbar ul { list-style: none; display: flex; gap: 28px; margin: 0; padding: 0; align-items: center; }
        .site-navbar ul li a { color: #333; text-decoration: none; }
        .site-navbar .auth-area { display: flex; align-items: center; gap: 18px; }
        .site-navbar .auth-area img { width: 36px; height: 36px; border-radius: 50%; }
        @media (max-width: 768px) { .site-navbar .container { flex-direction: column; gap: 10px; } .site-navbar ul { flex-wrap: wrap; justify-content: center; } }

        /* avoid content hiding under fixed navbar */
        body { padding-top: 72px; }
    </style>

    <div class="container">

        {{-- LOGO --}}
        <div class="logo text-xl font-bold text-green-700">
            <a href="{{ url('/') }}">IBTU</a>
        </div>

        {{-- LINKS --}}
        <ul class="flex items-center space-x-8">

            <li>
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-black">
                    Home
                </a>
            </li>

            <li>
                <a href="{{ url('/products') }}" class="text-gray-700 hover:text-black">
                    Products
                </a>
            </li>

            {{-- 🛒 CART WITH COUNT --}}
            <li class="relative">
                <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-black flex items-center gap-1">
                    🛒 Cart

                    @php
                        $cart = session('cart', []);
                        $cartCount = 0;

                        foreach ($cart as $item) {
                            $cartCount += $item['quantity'] ?? 0;
                        }
                    @endphp

                    @if($cartCount > 0)
                        <span class="ml-1 bg-green-600 text-white text-xs font-bold px-2 py-0.5 rounded-full">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
            </li>

            <li>
                <a href="{{ url('/contact') }}" class="text-gray-700 hover:text-black">
                    Contact
                </a>
            </li>

        </ul>

        {{-- PROFILE AREA --}}
        <div class="auth-area flex items-center gap-3">

            {{-- PROFILE IMAGE (ALWAYS VISIBLE) --}}
            <img
                src="{{ asset('images/profile.png') }}"
                alt="Profile"
                class="w-9 h-9 rounded-full border border-green-600 object-cover cursor-pointer"
            >

            @auth
                <span class="text-gray-700 text-sm">
                    {{ auth()->user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-sm text-red-600 hover:underline">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:underline">
                    Login
                </a>
                <a href="{{ route('register') }}" class="text-sm text-gray-700 hover:underline">
                    Register
                </a>
            @endauth

        </div>

    </div>
</nav>
