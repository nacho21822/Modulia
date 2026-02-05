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

  <div class="form-container sign-up-container">
    <form method="POST" action="{{ route('register.post') }}" id="registerForm" novalidate>
      @csrf

      <h1>Create Account</h1>
      <span>or use your email for registration</span>

      <div class="input-group">
        <input type="text" id="regName" name="name" placeholder="Name" required />
        <small class="error-text">Name is required</small>
      </div>

      <div class="input-group">
        <input type="email" id="regEmail" name="email" placeholder="Email" required />
        <small class="error-text">Invalid email</small>
      </div>

      <div class="input-group">
        <input type="password" id="regPassword" name="password" placeholder="Password" required />
        <small class="error-text">The password is not secure</small>
      </div>

      <ul class="password-criteria">
         <li id="req-len">Minimum 8 characters</li>
         <li id="req-upper">One uppercase letter</li>
         <li id="req-num">One number</li>
      </ul>

      <div class="input-group">
        <input type="password" id="regConfirm" name="password_confirmation" placeholder="Confirm Password" required />
        <small class="error-text">Passwords do not match</small>
      </div>

      <button type="submit">Sign Up</button>
    </form>
  </div>

  <div class="form-container sign-in-container">
    <form method="POST" action="{{ route('login.post') }}">
      @csrf

      <h1>Sign in</h1>
      <span>or use your account</span>

      {{-- ❌ CAMBIO 1: AQUÍ HE BORRADO EL BLOQUE @if QUE TENÍAS ANTES --}}
      {{-- Ya no queremos que el mensaje salga aquí dentro --}}

      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />

      <button type="submit">Sign In</button>
    </form>
  </div>

  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <h1>Welcome Back!</h1>
        <p>To keep connected with us please login with your personal info</p>
        <button class="ghost" id="signIn">Sign In</button>
      </div>
      <div class="overlay-panel overlay-right">
        <h1>Hello, Friend!</h1>
        <p>Enter your personal details and start your journey with us</p>
        <button class="ghost" id="signUp">Sign Up</button>
      </div>
    </div>
  </div>

</div>

{{-- SUCCESS MODAL --}}
@if (session('success'))
    <div class="modal-backdrop" id="successModal">
        <div class="modal-content">
            <div class="success-icon">✔</div>
            <h2>Registration Successful!</h2>
            <p>{{ session('success') }}</p>
            
            <button class="btn-close-modal" id="closeModalBtn" data-redirect="{{ route('home') }}">
                Understood
            </button>
        </div>
    </div>
@endif

<script src="{{ asset('js/modalLogIn.js') }}"></script>
</body>
</html>