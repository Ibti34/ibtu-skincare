@extends('layouts.main')

@section('content')
<section class="cart-section">
    <h2>Your Cart</h2>

    @if(session('cart') && count(session('cart')) > 0)

        @php
            $total = 0;
            foreach(session('cart') as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        @endphp

        <table class="cart-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach(session('cart') as $id => $product)
                <tr>

                    {{-- IMAGE FIX: Uses the logic from your working index page --}}
                    <td>
                        @if(!empty($product['image']))
                            @if(file_exists(public_path('product_images/' . $product['image'])))
                                <img src="{{ asset('product_images/' . $product['image']) }}" alt="{{ $product['name'] }}" class="cart-img">
                            @else
                                <img src="{{ asset('storage/products/' . $product['image']) }}" alt="{{ $product['name'] }}" class="cart-img" onerror="this.src='{{ asset('images/placeholder.png') }}'">
                            @endif
                        @else
                            <img src="{{ asset('images/placeholder.png') }}" class="cart-img" alt="No Image">
                        @endif
                    </td>

                    {{-- NAME --}}
                    <td>{{ $product['name'] }}</td>

                    {{-- PRICE --}}
                    <td>{{ number_format($product['price'], 2) }} $</td>

                    {{-- QUANTITY --}}
                    <td>
                        <div class="qty-wrapper">

                            {{-- DECREASE: Route fixed to pass $id directly --}}
                            <form action="{{ auth()->check() ? route('cart.decrease.auth', $id) : route('cart.decrease.public', $id) }}" method="POST">
                                @csrf
                                <button type="submit" class="qty-btn">−</button>
                            </form>

                            <span class="qty-number">{{ $product['quantity'] }}</span>

                            {{-- INCREASE: Route fixed to pass $id directly --}}
                            <form action="{{ auth()->check() ? route('cart.increase.auth', $id) : route('cart.increase.public', $id) }}" method="POST">
                                @csrf
                                <button type="submit" class="qty-btn">+</button>
                            </form>

                        </div>
                    </td>

                    {{-- SUBTOTAL --}}
                    <td>{{ number_format($product['price'] * $product['quantity'], 2) }} $</td>

                    {{-- DELETE --}}
                    <td>
                        <form action="{{ auth()->check() ? route('cart.remove.auth', $id) : route('cart.remove.public', $id) }}" method="POST">
                            @csrf
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="cart-total">
            <strong>Total:</strong> {{ number_format($total, 2) }} $
        </div>

        <div class="cart-actions">
            <a href="{{ url('/products') }}" class="btn">Continue Shopping</a>
            <a href="{{ route('checkout.index') }}" class="btn btn-primary">Checkout</a>
        </div>

    @else
        <p class="empty-cart">Your cart is empty.</p>
        <a href="{{ url('/products') }}" class="btn">Go to Products</a>
    @endif
</section>

{{-- CSS --}}
<style>
.cart-section { padding: 40px; max-width: 1000px; margin: auto; }
.cart-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
.cart-table th, .cart-table td { border-bottom: 1px solid #eee; padding: 15px; text-align: left; }
.cart-img { width: 80px; height: 80px; object-fit: cover; border-radius: 5px; }
.qty-wrapper { display: flex; align-items: center; gap: 10px; }
.qty-btn { width: 30px; height: 30px; border: 1px solid #ccc; background: #fff; cursor: pointer; border-radius: 50%; }
.delete-btn { color: #820505; background: none; border: none; cursor: pointer; font-weight: bold; }
.cart-total { text-align: right; font-size: 1.5rem; margin: 20px 0; }
.cart-actions { display: flex; justify-content: space-between; }
.btn-primary { background-color: #2563eb; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; }
</style>
@endsection