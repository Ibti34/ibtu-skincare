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

        <div class="product-grid">
            @foreach($products as $product)
            <div class="product-card">

                {{-- IMAGE --}}
                @if($product->image)

                    @if(file_exists(public_path('product_images/' . $product->image)))
                        <img src="{{ asset('product_images/' . $product->image) }}" alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}">
                    @endif

                @else
                    <img src="{{ asset('images/placeholder.png') }}" alt="No Image">
                @endif

                {{-- NAME --}}
                <h3>{{ $product->name }}</h3>

                {{-- DESCRIPTION --}}
                <p class="product-description">
                    {{ $product->description }}
                </p>

                {{-- PRICE --}}
                <p><strong>{{ number_format($product->price, 2) }} $</strong></p>

                {{-- ADD TO CART --}}
                <form action="{{ auth()->check() ? route('cart.add.auth', $product->id) : route('cart.add.public', $product->id) }}" method="POST">
                    @csrf
                    <button class="btn">🛒 Add to Cart</button>
                </form>

            </div>
            @endforeach
        </div>

    @endif
</section>

{{-- Keep your original product style exactly --}}
<style>
.products {
    padding: 20px;
}

/* Grid: 5 products per row on large screens */
.product-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
}

/* Responsive: 2 per row on medium screens, 1 per row on small screens */
@media (max-width: 1024px) {
    .product-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 640px) {
    .product-grid {
        grid-template-columns: 1fr;
    }
}

.product-card {
    border: 1px solid #ccc;
    padding: 15px;
    border-radius: 10px;
    text-align: center;
}

.product-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 8px;
}

.btn {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 12px;
    background-color: #2563eb;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
    border: none;
}

.btn:hover {
    background-color: #1e40af;
}

.alert-success {
    margin-bottom: 15px;
    padding: 10px;
    background-color: #d1fae5;
    border: 1px solid #10b981;
    color: #065f46;
    border-radius: 5px;
}
</style>

@endsection
