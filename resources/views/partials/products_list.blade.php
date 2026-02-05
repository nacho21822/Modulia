@forelse ($containers as $container)
    <article class="product-card">

        @auth
            @if(auth()->user()->role === 'admin')
                <a
                    href="{{ route('containers.edit', $container) }}"
                    class="admin-edit-btn"
                    title="Edit container"
                >
                    ✏️
                </a>
            @endif
        @endauth

        <div class="product-img">
            <img src="{{ $container->image ?? asset('img/foto3.jpg') }}">
        </div>

        <div class="product-info">
            <span class="product-category">{{ $container->category->name }}</span>
            <h3>{{ $container->name }}</h3>
            <span class="product-size">{{ ucfirst($container->type) }}</span>
            <span class="product-price">
                ${{ number_format($container->price, 0, ',', '.') }}
            </span>

            {{-- CARRITO --}}
            <form action="{{ route('cart.add', $container->id) }}" method="POST">
                @csrf
                <button type="submit" class="add-cart-btn">
                    Add to cart
                </button>
            </form>

        </div>
    </article>
@empty
    <p>No se encontraron productos con esos filtros.</p>
@endforelse