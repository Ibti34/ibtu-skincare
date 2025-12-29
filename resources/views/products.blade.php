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
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">

                    <h3>{{ $product->name }}</h3>
                    <p>{{ number_format($product->price, 2) }} ETB</p>

                    {{-- ADD TO CART --}}
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
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
