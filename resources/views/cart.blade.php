@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-12 px-4">

    <h2 class="text-3xl font-semibold mb-8 text-gray-800">
        🛒 Your Cart
    </h2>

    @if(empty($cart))
        <div class="bg-white p-6 rounded-lg shadow text-center text-gray-600">
            Your cart is empty.
        </div>
    @else
        <div class="space-y-6">
            @foreach($cart as $item)
                <div class="flex items-center gap-6 bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition">

                    {{-- IMAGE --}}
                  <div class="w-20 h-20 flex-shrink-0 bg-gray-100 rounded-md overflow-hidden border">

                        @if(!empty($item['image']))
                            <img
                                src="{{ asset('images/' . $item['image']) }}"
                                alt="{{ $item['name'] ?? '' }}"
                                class="w-full h-full object-cover"
                            >
                        @endif
                    </div>

                    {{-- INFO --}}
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold text-gray-800">
                            {{ $item['name'] ?? 'Product' }}
                        </h3>

                        <p class="text-gray-500 mt-1">
                            {{ number_format($item['price'] ?? 0, 2) }} $
                        </p>

                        <span class="inline-block mt-3 px-3 py-1 text-sm bg-gray-200 rounded-full">
                            Quantity: {{ $item['quantity'] ?? 1 }} 
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- CHECKOUT --}}
        <div class="mt-10 text-right">
            <a href="{{ route('checkout.index') }}"
               class="inline-flex items-center gap-2 bg-white text-black px-8 py-4 rounded-lg hover:bg-blue-600 transition text-lg">
                Proceed to Checkout →
            </a>
        </div>
    @endif

</div>
@endsection
