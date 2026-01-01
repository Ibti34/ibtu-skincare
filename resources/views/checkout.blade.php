@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-4">

    <h2 class="text-2xl font-semibold mb-6">Checkout</h2><br><br>

    @if(empty($cart))
        <p class="text-gray-600">Your cart is empty.</p>
    @else

        {{-- ORDER SUMMARY --}}
        <h3 class="text-lg font-medium mb-4">Order Summary</h3>

        @php $total = 0; @endphp

        <div class="space-y-2 mb-6">
            @foreach($cart as $item)
                @php
                    $subtotal = ($item['price'] ?? 0) * ($item['quantity'] ?? 1);
                    $total += $subtotal;
                @endphp

                <div class="flex items-center gap-2 text-gray-700">
                    <span>{{ $item['name'] }}</span>
                    <span>× {{ $item['quantity'] }}</span>
                    <span class="text-gray-400">—</span>
                    <span class="font-medium">
                        {{ number_format($subtotal, 2) }} ETB
                    </span>
                </div>
            @endforeach
        </div>

        <div class="flex items-center gap-2 font-semibold text-lg mb-8">
            <span>Total</span>
            <span class="text-gray-400">—</span>
            <span>{{ number_format($total, 2) }} ETB</span>
        </div>

        {{-- CHECKOUT FORM --}}
        <form method="POST" action="{{ route('checkout.store') }}" class="space-y-4 max-w-sm">
            @csrf

            <input
                type="text"
                name="name"
                placeholder="Your Name"
                required
                class="w-full border-b border-gray-300 py-2 focus:outline-none focus:border-black"
            >

            <input
                type="text"
                name="phone"
                placeholder="Phone Number"
                required
                class="w-full border-b border-gray-300 py-2 focus:outline-none focus:border-black"
            >

            <button
                type="submit"
                class="mt-4 bg-black text-white px-6 py-2 rounded hover:bg-gray-800 transition"
            >
                Place Order
            </button>
        </form>

    @endif

</div>
@endsection
