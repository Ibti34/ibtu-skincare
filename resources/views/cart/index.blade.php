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

                    {{-- IMAGE --}}
                    <td>
                        <img src="{{ asset('images/' . $product['image']) }}"
                             alt="{{ $product['name'] }}"
                             class="cart-img">
                    </td>

                    {{-- NAME --}}
                    <td>{{ $product['name'] }}</td>

                    {{-- PRICE --}}
                    <td>{{ number_format($product['price'], 2) }} $</td>

                    {{-- QUANTITY --}}
                    <td>
                        <div class="qty-wrapper">

                            {{-- DECREASE --}}
                            <form action="{{ auth()->check() ? route('cart.decrease.auth', $id) : route('cart.decrease.public') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit" class="qty-btn">−</button>
                            </form>

                            <span class="qty-number">{{ $product['quantity'] }}</span>

                            {{-- INCREASE --}}
                            <form action="{{ auth()->check() ? route('cart.increase.auth', $id) : route('cart.increase.public') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit" class="qty-btn">+</button>
                            </form>

                        </div>
                    </td>

                    {{-- SUBTOTAL --}}
                    <td>{{ number_format($product['price'] * $product['quantity'], 2) }} $</td>

                    {{-- DELETE --}}
                    <td>
                        <form action="{{ auth()->check() ? route('cart.remove.auth', $id) : route('cart.remove.public') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}">
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

{{-- INLINE CSS --}}
<style>
.cart-img {
    width: 60px;
}

.qty-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
}

.qty-btn {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    border: 1px solid #ccc;
    background-color: #f3f3f3;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
}

.qty-btn:hover {
    background-color: #e0e0e0;
}

.qty-number {
    font-weight: bold;
    min-width: 20px;
    text-align: center;
}

.delete-btn {
    background: none;
    border: none;
    color: rgb(130, 5, 5);
    cursor: pointer;
    font-weight: 600;
}
</style>
@endsection
