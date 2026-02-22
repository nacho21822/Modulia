<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Modulia - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/header.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/cookies.css') }}" />

    @stack('styles')
  </head>

  <body>

    @include('header')

    @yield('content')


    @include('footer')

    {{-- COOKIE CONSENT BANNER --}}
    <div id="cookieBanner" role="dialog" aria-label="Cookie consent">
        <div class="cc-text">
            <strong>🍪 We use cookies</strong>
            <p>
                We use essential cookies to keep the site running and optional analytics cookies
                to understand how visitors interact with our content.
                You can accept or reject non-essential cookies at any time.
            </p>
        </div>
        <div class="cc-actions">
            <button class="cc-btn" id="ccReject">Reject</button>
            <button class="cc-btn" id="ccAccept">Accept all</button>
        </div>
    </div>

    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/cookies.js') }}"></script>

    @stack('scripts')

  </body>
</html>