<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Verify Email | Modulia</title>
  <link rel="stylesheet" href="{{ asset('css/login-modal.css') }}" />
  <style>
    .verify-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
      padding: 50px 60px;
      max-width: 500px;
      width: 90%;
      text-align: center;
    }
    .verify-card h1 { margin-bottom: 10px; font-size: 22px; }
    .verify-card p { margin: 15px 0 25px; color: #555; font-size: 14px; }
    .verify-card .email-icon {
      font-size: 48px;
      margin-bottom: 20px;
      display: block;
    }
    .btn-resend {
      display: block;
      width: 100%;
      margin-top: 15px;
      border-radius: 20px;
      border: 1px solid #4b4b4b;
      background-color: transparent;
      color: #4b4b4b;
      font-size: 12px;
      font-weight: bold;
      padding: 12px 45px;
      letter-spacing: 1px;
      text-transform: uppercase;
      cursor: pointer;
      transition: background 0.2s, color 0.2s;
    }
    .btn-resend:hover {
      background-color: #4b4b4b;
      color: #fff;
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

<div class="verify-card">
  <span class="email-icon">&#9993;</span>
  <h1>Verify your email</h1>
  <p>
    Thanks for registering! Before you can access the site, please verify your
    email address by clicking the link we just sent you.
  </p>

  @if (session('resent'))
    <div class="alert-success">
      A new verification link has been sent to your email address.
    </div>
  @endif

  @if (session('success'))
    <div class="alert-success">
      {{ session('success') }}
    </div>
  @endif

  <form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit">Resend verification email</button>
  </form>

  <form method="POST" action="{{ route('logout') }}" style="margin-top: 10px;">
    @csrf
    <button type="submit" class="btn-resend">Log out</button>
  </form>
</div>

</body>
</html>
