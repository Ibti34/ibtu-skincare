@extends('layouts.main')

@section('content')
<section class="dashboard-section">
    <h2>Welcome, {{ auth()->user()->name }} 👋</h2>
    <p>Manage your products, view your cart, and checkout easily from here.</p>

    <div class="dashboard-cards">

        {{-- Products Card --}}
        <div class="card">
            <h3>Products</h3>
            <p>Browse and shop our products.</p>
            <a href="{{ route('products.index') }}" class="btn">View Products</a>
        </div>

        {{-- Cart Card --}}
        <div class="card">
            <h3>Cart</h3>
            <p>Check items you added to cart.</p>
            <a href="{{ route('cart.index') }}" class="btn">View Cart</a>
        </div>

        {{-- Checkout Card --}}
        <div class="card">
            <h3>Checkout</h3>
            <p>Proceed to complete your order.</p>
            <a href="{{ route('checkout.index') }}" class="btn btn-primary">Go to Checkout</a>
        </div>

    </div>
</section>
@endsection
