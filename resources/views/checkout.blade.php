@extends('layouts.app')

@section('content')
<div class="checkout-wrapper">

    <div class="checkout-box">

        <h2>Checkout</h2>

        @if(empty($cart))
            <p class="empty-text">Your cart is empty.</p>
        @else

            <h3>Order Summary</h3>

            @php $total = 0; @endphp

            <div class="order-summary">
                @foreach($cart as $item)
                    @php
                        $subtotal = ($item['price'] ?? 0) * ($item['quantity'] ?? 1);
                        $total += $subtotal;
                    @endphp

                    <div class="order-row">
                        <span>{{ $item['name'] }} × {{ $item['quantity'] }}</span>
                        <span class="price">
                            {{ number_format($subtotal, 2) }} $
                        </span>
                    </div>
                @endforeach
            </div>

            <div class="order-total">
                <span>Total</span>
                <span>{{ number_format($total, 2) }} $</span>
            </div>

            <form method="POST" action="{{ route('checkout.store') }}">
                @csrf

                <input
                    type="text"
                    name="name"
                    placeholder="Your Name"
                    required
                >
<br><br>
                <input
                    type="text"
                    name="phone"
                    placeholder="Phone Number"
                    required
                >
<br><br>
                <button type="submit">
                    Place Order
                </button>
            </form>

        @endif

    </div>

</div>
@endsection
