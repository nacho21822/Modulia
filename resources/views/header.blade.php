<header class="header">
  
  <a href="{{ route('home') }}">
    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo" />
  </a>

  <nav class="nav-buttons">

    <a href="{{ route('products.index') }}" class="button">Our Products</a>
    <a href="{{ route('contacto') }}" class="button">Contact</a>

    {{-- USUARIO NO LOGUEADO --}}
    @guest
      <a href="{{ route('login') }}" class="button">Log in</a>
    @endguest

    {{-- USUARIO LOGUEADO --}}
    @auth
      <div class="user-menu">
        <button class="user-button" id="userMenuToggle">
          <img src="{{ asset('img/user-icon.png') }}" alt="User">
        </button>

        <ul class="user-dropdown" id="userDropdown">
          <li class="user-name">
            {{ auth()->user()->name }}
          </li>

          <li>
            <a href="#">My profile</a>
          </li>

          <li>
            <a href="#">My orders</a>
          </li>

          @if(auth()->user()->role === 'admin')
            <li>
              <a href="/admin">Admin panel</a>
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

  </nav>
</header>
<script src="{{ asset('js/header.js') }}"></script>

