<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reset Password | Modulia</title>
  <link rel="stylesheet" href="{{ asset('css/login-modal.css') }}" />
  <style>
    .reset-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
      padding: 50px 60px;
      max-width: 480px;
      width: 90%;
      text-align: center;
    }
    .reset-card h1 { margin-bottom: 10px; font-size: 22px; }
    .reset-card p { margin: 10px 0 25px; color: #555; font-size: 14px; }
    .reset-card form { padding: 0; height: auto; background: transparent; }
    .reset-card input { margin-bottom: 10px; }
    .back-link {
      display: block;
      margin-top: 20px;
      color: #4b4b4b;
      font-size: 13px;
      text-decoration: underline;
    }
    .password-criteria {
      list-style: none;
      padding: 0;
      margin: 5px 0 15px;
      text-align: left;
      font-size: 12px;
      color: #666;
    }
    .password-criteria li.valid {
      color: #198754;
      font-weight: bold;
    }
  </style>
</head>
<body>

<a href="{{ route('home') }}" class="logo-link">
  <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo" />
</a>

<div class="reset-card">
  <h1>Reset Password</h1>
  <p>Enter your new password below.</p>

  <form method="POST" action="{{ route('password.update') }}" novalidate>
    @csrf

    <input type="hidden" name="token" value="{{ $token }}" />

    <div class="input-group {{ $errors->has('email') ? 'error' : '' }}">
      <input
        type="email"
        name="email"
        placeholder="Email"
        value="{{ old('email', $email ?? '') }}"
        required
      />
      @error('email')
        <small class="server-error">{{ $message }}</small>
      @enderror
    </div>

    <div class="input-group {{ $errors->has('password') ? 'error' : '' }}">
      <input
        type="password"
        id="newPassword"
        name="password"
        placeholder="New Password"
        required
      />
      @error('password')
        <small class="server-error">{{ $message }}</small>
      @enderror
    </div>

    <ul class="password-criteria">
      <li id="req-len">Minimum 8 characters</li>
      <li id="req-upper">One uppercase letter</li>
      <li id="req-num">One number</li>
    </ul>

    <div class="input-group">
      <input
        type="password"
        id="confirmPassword"
        name="password_confirmation"
        placeholder="Confirm New Password"
        required
      />
      <small class="error-text">Passwords do not match</small>
    </div>

    <button type="submit">Reset Password</button>
  </form>

  <a href="{{ route('login') }}" class="back-link">&larr; Back to login</a>
</div>

<script>
  const pwd  = document.getElementById('newPassword');
  const conf = document.getElementById('confirmPassword');

  pwd.addEventListener('input', function () {
    const v = this.value;
    document.getElementById('req-len').classList.toggle('valid', v.length >= 8);
    document.getElementById('req-upper').classList.toggle('valid', /[A-Z]/.test(v));
    document.getElementById('req-num').classList.toggle('valid', /[0-9]/.test(v));
  });

  conf.addEventListener('input', function () {
    const group = this.closest('.input-group');
    group.classList.toggle('error', this.value !== pwd.value);
  });
</script>
</body>
</html>
