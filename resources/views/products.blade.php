@extends('layouts.app')

@section('title', 'Our Products | Modulia')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}" />
@endpush

@section('content')

<header class="products-header">
  <span class="header-eyebrow">Our collection</span>
  <h1>Modular Products</h1>
  <p>
    A curated selection of modular spaces designed for living,
    working and commercial use.
  </p>
</header>

<div class="products-layout">

  <!-- FILTERS -->
  <aside class="filters">

    <div class="filter-group">
      <h4>Search</h4>
      <input type="text" placeholder="Search products">
    </div>

    <div class="filter-group">
      <h4>Categories</h4>
      <ul class="categories-list">
        <li class="active" data-category="all">All Products</li>

        @foreach ($categories as $category)
          <li data-category="{{ Str::slug($category->name) }}">
            {{ $category->name }}
          </li>
        @endforeach
      </ul>
    </div>

    <div class="filter-group">
      <h4>Price Range</h4>
      <div class="price-range">
        <input type="number" placeholder="0">
        <span>—</span>
        <input type="number" placeholder="200000">
      </div>
    </div>

  </aside>

  <!-- PRODUCTS -->
  <section class="products-grid">

    @foreach ($categories as $category)
      @foreach ($category->containers as $container)

        <article
          class="product-card"
          data-category="{{ Str::slug($category->name) }}"
          data-price="{{ $container->price }}"
          data-name="{{ Str::slug($container->name) }}"
        >
          <div class="product-img">
            <img src="{{ asset('img/' . ($container->image ?? 'foto3.jpg')) }}">
          </div>

          <div class="product-info">
            <span class="product-category">{{ $category->name }}</span>

            <h3>{{ $container->name }}</h3>

            <span class="product-size">
              {{ ucfirst($container->type) }}
            </span>

            <span class="product-price">
              ${{ number_format($container->price, 0, ',', '.') }}
            </span>
          </div>
        </article>

      @endforeach
    @endforeach

  </section>

</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/products.js') }}"></script>
@endpush
