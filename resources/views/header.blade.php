{{-- Detectamos si estamos en home para poner el header transparente --}}
@php
    $isHome = request()->routeIs('home');
@endphp

<header class="header {{ $isHome ? 'header--transparent' : '' }}">

  <a href="{{ route('home') }}">
    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo" />
  </a>

  <button class="hamburger" id="hamburgerBtn" aria-label="Abrir menú">
    <span></span>
    <span></span>
    <span></span>
  </button>

  <nav class="nav-buttons" id="navButtons">

    <a href="{{ route('products.index') }}" class="button">Our Products</a>
    <a href="{{ route('contacto') }}" class="button">Contact</a>

    {{-- USUARIO NO LOGUEADO --}}
    @guest
      <a href="{{ route('login') }}" class="button">Log in</a>
    @endguest

    {{-- USUARIO LOGUEADO --}}
    @auth
      <div class="user-menu">
        <button class="button" id="userMenuToggle">
          {{ auth()->user()->name }}
        </button>

        <ul class="user-dropdown" id="userDropdown">
          <li class="user-name">
            {{ auth()->user()->name }}
          </li>

          <li>
            <a href="{{ route('profile.show') }}">My profile</a>
          </li>

          <li>
            <a href="{{ route('cart.index') }}">My orders</a>
          </li>

          @if(auth()->user()->role === 'admin')
            <li>
              <a href="{{ route('containers.create') }}">Admin panel</a>
            </li>
          @endif

          <li class="divider"></li>

          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="logout-btn">
                Logout
              </button>
            </form>
          </li>
        </ul>
      </div>
    @endauth

    {{-- Botón cerrar (solo móvil) --}}
    <button class="nav-close" id="navClose" aria-label="Cerrar menú">
      <span></span>
      <span></span>
    </button>

  </nav>
</header>
<script src="{{ asset('js/header.js') }}"></script>