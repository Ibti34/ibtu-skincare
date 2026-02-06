@extends('layouts.main')

@section('content')
<section class="products">
    <h2>Our Products</h2>

    @php
        $products = $products ?? collect();
    @endphp

    @if($products->count() === 0)
        <p>No products available.</p>
    @else

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="product-grid">
            @foreach($products as $product)
                <div class="product-card">

                    {{-- IMAGE --}}
                    <img
                        src="{{ !empty($product->image)
                            ? asset('storage/products/' . $product->image)
                            : asset('images/placeholder.png') }}"
                        alt="{{ $product->name }}"
                    >

                    {{-- NAME --}}
                    <h3>{{ $product->name }}</h3>

                    {{-- PRICE --}}
                    <p>{{ number_format($product->price, 2) }} ETB</p>

                    {{-- ADD TO CART --}}
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button class="btn">🛒 Add to Cart</button>
                    </form>

                </div>
            @endforeach
        </div>

    @endif
</section>
@endsection
