<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Rivo Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>
<body>
  <div id="rivoLoader" class="rivo-loader">
    <div class="rivo-loader__spinner"></div>
    <span class="rivo-loader__text">Loading Rivo...</span>
  </div>

  <div class="rivo-login-page">
    <!-- Branding Section -->
    <section class="rivo-login-brand">
      <div class="rivo-login-brand__shape"></div>
      <div class="rivo-login-brand__shape"></div>
      <div class="rivo-login-brand__shape"></div>
      <div class="rivo-login-brand__content">
        <div class="rivo-login-brand__logo">R</div>
        <h1>Rivo</h1>
        <p>Premium admin dashboard for modern businesses. Manage users, products, orders and more in one place.</p>
      </div>
    </section>

    <!-- Login Form -->
    <section class="rivo-login-form-wrap">
      <form action="{{route('login.admin.check')}}" method="POST" >
        @csrf
        <h2>Welcome back</h2>
        <p class="subtitle">Sign in to your admin account to continue</p>
        @error('admin_error')
            <p style="color: red; font-weight:bold; margin-button:15px; ">{{$message}}</p>
        @enderror
        <div class="rivo-form-group">
          <label for="email">Email Address</label>
          <div class="rivo-input-wrap">
            {{-- <i class="bi bi-envelope"></i> --}}
            <input type="email" class="form-control" id="email" name="email"  value="{{old('email')}}">
          </div>
        </div>

        <div class="rivo-form-group">
          <label for="password">Password</label>
          <div class="rivo-input-wrap">
            {{-- <i class="bi bi-lock"></i> --}}
            <input type="password" class="form-control" id="password" name="password" >
          </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
          </div>
          <a href="#">Forgot password?</a>
        </div>

        <button type="submit" class="btn btn-rivo-primary w-100 py-2 mb-3">
          <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
        </button>

        <p class="text-center text-muted small mb-0">
          Demo credentials: any email &amp; password
        </p>
      </form>
    </section>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('assets/js/script.js')}}"></script>
</body>
</html>
