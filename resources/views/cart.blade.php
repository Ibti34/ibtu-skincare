@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-12 px-4">

    <h2 class="text-3xl font-semibold mb-8 text-gray-800">
        🛒 Your Cart
    </h2>

    @if(empty($cart) || count($cart) == 0)
        <div class="bg-white p-10 rounded-xl shadow-sm text-center">
            <p class="text-gray-500 text-lg mb-6">Your cart is empty.</p>
            <a href="{{ route('products.index') }}" class="text-blue-600 font-medium hover:underline">
                ← Back to Shopping
            </a>
        </div>
    @else
        <div class="space-y-6">
            @php $grandTotal = 0; @endphp
            
            @foreach($cart as $id => $item)
                @php 
                    $subtotal = $item['price'] * $item['quantity']; 
                    $grandTotal += $subtotal;
                @endphp

                <div class="flex flex-wrap md:flex-nowrap items-center gap-6 bg-white p-6 rounded-xl shadow-sm border border-gray-100">

                    {{-- IMAGE FIX: Handles seeded images vs uploaded images --}}
                    <div class="w-24 h-24 flex-shrink-0 bg-gray-50 rounded-lg overflow-hidden border">
                        <img 
                            src="{{ str_starts_with($item['image'], 'product') ? asset('product_images/' . $item['image']) : asset('storage/' . $item['image']) }}" 
                            alt="{{ $item['name'] }}"
                            class="w-full h-full object-cover"
                            onerror="this.src='https://via.placeholder.com/150?text=No+Image';"
                        >
                    </div>

                    {{-- PRODUCT INFO --}}
                    <div class="flex-1 min-w-[200px]">
                        <h3 class="text-xl font-bold text-gray-800">{{ $item['name'] }}</h3>
                        <p class="text-gray-500">{{ number_format($item['price'], 2) }} ETB</p>
                        <p class="mt-1 text-sm font-semibold text-blue-600">
                            Subtotal: {{ number_format($subtotal, 2) }} ETB
                        </p>
                    </div>

                    {{-- QUANTITY CONTROLS --}}
                    <div class="flex items-center bg-gray-100 rounded-lg p-1">
                        {{-- DECREASE --}}
                        <form action="{{ route('cart.decrease.public', $id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-8 h-8 flex items-center justify-center bg-white rounded shadow-sm hover:bg-gray-50 text-xl font-bold">
                                −
                            </button>
                        </form>

                        <span class="px-4 font-bold text-lg min-w-[40px] text-center">
                            {{ $item['quantity'] }}
                        </span>

                        {{-- INCREASE --}}
                        <form action="{{ route('cart.increase.public', $id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-8 h-8 flex items-center justify-center bg-white rounded shadow-sm hover:bg-gray-50 text-xl font-bold">
                                +
                            </button>
                        </form>
                    </div>

                    {{-- DELETE --}}
                    <form action="{{ route('cart.remove.public', $id) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700 font-medium px-2">
                            Delete
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        {{-- CART FOOTER --}}
        <div class="mt-10 p-6 bg-gray-50 rounded-xl border border-dashed border-gray-300">
            <div class="flex justify-between items-center mb-6">
                <span class="text-xl text-gray-600">Total Amount:</span>
                <span class="text-3xl font-bold text-gray-900">{{ number_format($grandTotal, 2) }} ETB</span>
            </div>
            
            <div class="flex justify-between items-center">
                <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">
                    ← Continue Shopping
                </a>
                <a href="{{ route('checkout.index') }}"
                   class="bg-green-600 text-white px-10 py-4 rounded-lg hover:bg-green-700 transition-all shadow-lg font-bold text-lg">
                    Proceed to Checkout
                </a>
            </div>
        </div>
    @endif

</div>
@endsection