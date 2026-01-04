@extends('layouts.main')   {{-- keep your existing layout --}}

@section('content')

{{-- ================= HERO SECTION ================= --}}
<section class="hero">
    <div class="hero-content">
        <h1>Natural Skin Care</h1>
        <p>
            Discover the best natural products for healthy, glowing,
            and beautiful skin.
        </p>
        <a href="{{ route('products.index') }}" class="hero-btn">
            Shop Now
        </a>
    </div>

    <div class="hero-image">
        <img src="{{ asset('images/hero.png') }}" alt="IBTU Skin Care">
    </div>
</section>



{{-- ================= PRODUCTS SECTION ================= --}}
<section class="products">
    <h2>Our Products</h2>
   <br>

    @auth
        <p class="auth-text">
            Welcome, <strong>{{ Auth::user()->name }}</strong> 👋
        </p><br>
    @else
        <p class="auth-text">
            Please login or register to shop our products.
        </p><br><br>
        <div class="auth-links">
            <a href="{{ route('login') }}" class="hero-btn small">Login</a>
            <a href="{{ route('register') }}" class="hero-btn outline">Register</a>
        </div><br><br>
    @endauth

    <div class="product-grid">
        <div class="product-card">
            <img src="{{ asset('images/product1.png') }}" alt="Body Cream">
            <h3>Body Cream</h3>
            <p class="price">$25.00</p>
        </div>

        <div class="product-card">
            <img src="{{ asset('images/product2.png') }}" alt="Face Cream">
            <h3>Face Cream</h3>
            <p class="price">$27.50</p>
        </div>

        <div class="product-card">
            <img src="{{ asset('images/product3.png') }}" alt="Skin Lotion">
            <h3>Skin Lotion</h3>
            <p class="price">$20.78</p>
        </div>
    </div>
</section>




@endsection
