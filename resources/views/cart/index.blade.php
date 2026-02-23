@extends('layouts.app')

@section('title', 'Your Cart')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endpush

@section('content')

<div class="cart-page">

    <div class="back-link-wrapper">
        <a href="{{ route('products.index') }}" class="back-link">← Back to catalogue</a>
    </div>

    <h1>Your Cart</h1>

    {{-- Success/error messages --}}
    @if(session('success'))
        <div class="cart-alert cart-alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="cart-alert cart-alert-error">{{ session('error') }}</div>
    @endif

    @if($items->count() > 0)
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    @php $subtotal = $item->price * $item->quantity; @endphp
                    <tr>
                        <td>{{ $item->container->name }}</td>
                        <td>${{ number_format($item->price, 0, ',', '.') }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($subtotal, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->container_id) }}" method="POST">
                                @csrf
                                <button type="submit" class="remove-btn">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="cart-total">
            <strong>Total: ${{ number_format($total, 0, ',', '.') }}</strong>
        </div>

        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            <button type="submit" class="clear-cart-btn">Clear Cart</button>
        </form>

    @else
        <p class="empty-cart">Your cart is empty.</p>
    @endif

</div>

@endsection
