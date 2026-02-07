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

                    <div class="product-image">
                        {{-- 
                           FIX: Changed path from 'storage/products/' to 'images/' 
                           This matches your folder structure in public/images/
                        --}}
                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                    </div>

                    <h3>{{ $product->name }}</h3>

                    <p>
                        @if($product->description)
                            {{ \Illuminate\Support\Str::limit($product->description, 100, '...') }}
                        @else
                            No description available.
                        @endif
                    </p>

                    <p class="product-price">
                        @if(is_numeric($product->price))
                            ${{ number_format((float)$product->price, 2) }}
                        @else
                            N/A
                        @endif
                    </p>

                    {{-- 
                       Optional: You can wrap this button in @auth if you 
                       only want logged-in users to see the 'Add to Cart' button.
                    --}}
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
@endsection