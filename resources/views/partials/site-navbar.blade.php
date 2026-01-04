<nav class="site-navbar bg-white shadow">

    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        {{-- LOGO --}}
        <div class="text-xl font-bold text-green-700">
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
        <div class="flex items-center gap-3">

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
