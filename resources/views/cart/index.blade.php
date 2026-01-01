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
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $id => $product)
                <tr>
                    <td><img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['name'] }}"></td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ number_format($product['price'], 2) }} $</td>
                    <td>{{ $product['quantity'] }}</td>
                    <td>{{ number_format($product['price'] * $product['quantity'], 2) }} $</td>
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
@endsection
