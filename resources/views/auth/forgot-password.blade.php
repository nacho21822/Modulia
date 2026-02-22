<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forgot Password | Modulia</title>
  <link rel="stylesheet" href="{{ asset('css/login-modal.css') }}" />
  <style>
    .forgot-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
      padding: 50px 60px;
      max-width: 480px;
      width: 90%;
      text-align: center;
    }
    .forgot-card h1 { margin-bottom: 10px; font-size: 22px; }
    .forgot-card p { margin: 10px 0 25px; color: #555; font-size: 14px; line-height: 20px; }
    .forgot-card form { padding: 0; height: auto; background: transparent; }
    .forgot-card input { margin-bottom: 15px; }
    .back-link {
      display: block;
      margin-top: 20px;
      color: #4b4b4b;
      font-size: 13px;
      text-decoration: underline;
    }
    .alert-success {
      background-color: #d1e7dd;
      color: #0f5132;
      padding: 10px 15px;
      border-radius: 6px;
      margin-bottom: 15px;
      font-size: 13px;
      border: 1px solid #badbcc;
    }
  </style>
</head>
<body>

<a href="{{ route('home') }}" class="logo-link">
  <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo" />
</a>

<div class="forgot-card">
  <h1>Forgot Password?</h1>
  <p>
    No problem. Enter your email address and we'll send you a link
    to reset your password.
  </p>

  @if (session('status'))
    <div class="alert-success">
      {{ session('status') }}
    </div>
  @endif

  <form method="POST" action="{{ route('password.email') }}" novalidate>
    @csrf

    <div class="input-group {{ $errors->has('email') ? 'error' : '' }}">
      <input
        type="email"
        name="email"
        placeholder="Email"
        value="{{ old('email') }}"
        required
      />
      @error('email')
        <small class="server-error">{{ $message }}</small>
      @enderror
    </div>

    <button type="submit">Send Reset Link</button>
  </form>

  <a href="{{ route('login') }}" class="back-link">&larr; Back to login</a>
</div>

</body>
</html>
