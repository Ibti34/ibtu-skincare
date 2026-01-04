@extends('layouts.main')

@section('content')

<section class="products">
    <h2>Our Products</h2>

    @if($products->isEmpty())
        <p>No products available.</p>
    @else
        <div class="product-grid">
            @foreach ($products as $product)
                <div class="product-card">

                    <!-- PRODUCT IMAGE -->
                    <div class="product-image">
                        <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}">
                    </div>

                    <!-- PRODUCT NAME -->
                    <h3>{{ $product->name }}</h3>

                    <!-- PRODUCT DESCRIPTION -->
                    <p>
                        @if($product->description)
                            {{ \Illuminate\Support\Str::limit($product->description, 100, '...') }}
                        @else
                            No description available.
                        @endif
                    </p>

                    <!-- PRODUCT PRICE -->
                    <p class="product-price">
                        @if(is_numeric($product->price))
                            ${{ number_format((float)$product->price, 2) }}
                        @else
                            N/A
                        @endif
                    </p>

                    <!-- ADD TO CART -->
                    <form action="{{ url('/cart/add/' . $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn">
                            🛒 Add to Cart
                        </button>
                    </form>

                </div>
            @endforeach
        </div>
    @endif
</section>

