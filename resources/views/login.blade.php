<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Modulia</title>

  <link rel="stylesheet" href="{{ asset('css/login-modal.css') }}" />
</head>

<body>
  @if(session('auth_message'))
  <div class="login-warning">
    {{ session('auth_message') }}
  </div>
  @endif

<a href="{{ route('home') }}" class="logo-link">
  <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo" />
</a>

<div class="container" id="container">

  <!-- REGISTRO -->
  <div class="form-container sign-up-container">
    <form method="POST" action="{{ route('register.post') }}">
      @csrf

      <h1>Create Account</h1>
      <span>or use your email for registration</span>

      <input type="text" name="name" placeholder="Name" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />

      <button type="submit">Sign Up</button>
    </form>
  </div>

  <!-- LOGIN -->
  <div class="form-container sign-in-container">
    <form method="POST" action="{{ route('login.post') }}">
      @csrf

      <h1>Sign in</h1>
      <span>or use your account</span>

      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />

      <button type="submit">Sign In</button>
    </form>
  </div>

  <!-- OVERLAY -->
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <h1>Welcome Back!</h1>
        <p>To keep connected with us please login with your personal info</p>
        <button class="ghost" id="signIn">Sign In</button>
      </div>
      <div class="overlay-panel overlay-right">
        <h1>Hello, Friend!</h1>
        <p>Enter your personal details and start journey with us</p>
        <button class="ghost" id="signUp">Sign Up</button>
      </div>
    </div>
  </div>

</div>

<script src="{{ asset('js/modalLogIn.js') }}"></script>
</body>
</html>
