@extends('layouts.main')   {{-- or whatever your old layout is --}}


@section('content')

<section class="hero">
    <div class="hero-text">
        <h1>Natural Skin Care</h1>
        <p>Discover the best natural products for healthy and glowing skin.</p>
        <a href="#" class="hero-btn">Shop Now</a>
    </div>

    <div class="hero-image">
        <img src="{{ asset('images/hero.png') }}" alt="Skin Care">
    </div>
</section>

<section class="products">
    <h2>Our Products</h2>
    <h1>Natural Skin Care</h1>

@auth
    <p>Welcome, {{ Auth::user()->name }} 👋</p>
    <a href="{{ route('products.index') }}">Shop Now</a>


@else
    <p>Please login or register to shop our products.</p>
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Register</a>
@endauth


    <div class="product-grid">
        <div class="product-card">
            <img src="{{ asset('images/product1.png') }}">
            <h3>Body Cream</h3>
            <p>$25.00</p>
        </div>
        <div class="product-card">
            <img src="{{ asset('images/product2.png') }}">
            <h3>Face Cream</h3>
            <p>$27.5.00</p>
        </div>
        <div class="product-card">
            <img src="{{ asset('images/product3.png') }}">
            <h3>Skin Lotion</h3>
            <p>$20.78.00</p>
        </div>
    </div>
</section>

@endsection
