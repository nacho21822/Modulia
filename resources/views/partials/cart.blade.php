@php
    $cart = session('cart', []);
    $total = 0;
    $count = 0;

    foreach($cart as $item){
        $total += $item['price'] * $item['quantity'];
        $count += $item['quantity'];
    }
@endphp

<div class="mini-cart">
    <a href="{{ route('cart.index') }}" class="mini-cart-header">
        🛒 Cart
        <span class="cart-count">{{ $count }}</span>
    </a>

    <div class="mini-cart-body">
        @if(empty($cart))
            <p class="mini-cart-empty">Cart is empty</p>
        @else
            <ul class="mini-cart-list">
                @foreach($cart as $id => $item)
                    <li>
                        <span class="mini-cart-name">{{ $item['name'] }}</span>
                        <span class="mini-cart-price">
                            ${{ number_format($item['price'], 0, ',', '.') }}
                        </span>
                        <span class="mini-cart-qty">x{{ $item['quantity'] }}</span>
                    </li>
                @endforeach
            </ul>

            <div class="mini-cart-total">
                Total:
                <strong>${{ number_format($total, 0, ',', '.') }}</strong>
            </div>

            <a href="{{ route('cart.index') }}" class="mini-cart-btn">
                View cart
            </a>
        @endif
    </div>
</div>