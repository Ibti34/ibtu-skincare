<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        {{-- LOGO --}}
        <div class="text-xl font-bold">
            IBTU
        </div>

        {{-- LINKS --}}
        <ul class="flex items-center space-x-8">

            <li><a href="{{ url('/') }}" class="text-gray-700 hover:text-black">Home</a></li>
            <li><a href="{{ url('/products') }}" class="text-gray-700 hover:text-black">Products</a></li>
            <li><a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-black">Cart</a></li>
            <li><a href="{{ url('/contact') }}" class="text-gray-700 hover:text-black">Contact</a></li>
        </ul>

        {{-- AUTH --}}
        <div class="flex items-center gap-4">
            @auth
                <span class="text-gray-700">{{ auth()->user()->name }}</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-sm text-red-600 hover:underline">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 hover:underline">Login</a>
                <a href="{{ route('register') }}" class="text-gray-700 hover:underline">Register</a>
            @endauth
        </div>

    </div>
</nav>
