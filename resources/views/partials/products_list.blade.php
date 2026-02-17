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
            {{-- CORRECCIÓN: Alt descriptivo para accesibilidad --}}
            <img
                src="{{ $container->image ?? asset('img/foto3.jpg') }}"
                alt="{{ $container->name }}"
            >
        </div>

        <div class="product-info">
            <span class="product-category">{{ $container->category->name }}</span>
            <h3>{{ $container->name }}</h3>
            <span class="product-size">{{ ucfirst($container->type) }}</span>
            <span class="product-price">
                ${{ number_format($container->price, 0, ',', '.') }}
            </span>

            <form action="{{ route('cart.add', $container->id) }}" method="POST">
                @csrf
                <button type="submit" class="add-cart-btn">
                    Add to cart
                </button>
            </form>
        </div>

    </article>
@empty
    <p>No products found with those filters.</p>
@endforelse