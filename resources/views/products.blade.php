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

  <aside class="filters">

    <div class="filter-group">
      <h4>Search</h4>
      <input type="text" id="search-input" placeholder="Search products">
    </div>

    <div class="filter-group">
      <h4>
        Categories
        @auth
          @if(auth()->user()->role === 'admin')
            <a href="{{ route('categories.create') }}" class="admin-plus" title="Add category">
              ➕
            </a>
          @endif
        @endauth
      </h4>

      <ul class="categories-list">
        <li class="active" data-category="all">All Products</li>

        @foreach ($categories as $category)
          <li data-category="{{ $category->name }}">
            {{ $category->name }}
          </li>
        @endforeach
      </ul>
    </div>

    <div class="filter-group">
      <h4>Price Range</h4>
      <div class="price-range">
        <input type="number" id="min-price" placeholder="0">
        <span>—</span>
        <input type="number" id="max-price" placeholder="200000">
      </div>
    </div>

  </aside>

  <div class="products-content">

    @auth
      @if(auth()->user()->role === 'admin')
        <div class="admin-actions">
          <a href="{{ route('containers.create') }}" class="admin-add-btn">
            ➕ Add container
          </a>
        </div>
      @endif
    @endauth

    <section class="products-grid" id="products-container">
      @include('partials.products_list')
    </section>

  </div>

</div>


@endsection

@push('scripts')
    <script src="{{ asset('js/products.js') }}"></script>
@endpush