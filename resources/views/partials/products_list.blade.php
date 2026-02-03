@forelse ($containers as $container)
    <article class="product-card">
        <div class="product-img">
            <img src="{{ asset('img/' . ($container->image ?? 'foto3.jpg')) }}">
        </div>
        <div class="product-info">
            {{-- Accedemos al nombre de la categoría gracias a la relación belongsTo --}}
            <span class="product-category">{{ $container->category->name }}</span>
            <h3>{{ $container->name }}</h3>
            <span class="product-size">{{ ucfirst($container->type) }}</span>
            <span class="product-price">${{ number_format($container->price, 0, ',', '.') }}</span>
        </div>
    </article>
@empty
    <p>No se encontraron productos con esos filtros.</p>
@endforelse