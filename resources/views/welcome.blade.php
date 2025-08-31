<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat app</title>
   <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
   <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <div class="auth-wrap">
  <form class="auth-card" action="{{route('chat.message')}}" method="POST">
    @csrf
    <h1>Welcome back</h1>
    <p class="subtitle">Sign in to continue</p>

    <label class="field">
      <span>Email</span>
      <input type="email" name="email" placeholder="you@example.com" required />
    </label>

    <label class="field">
      <span>Password</span>
      <input type="password" name="password" placeholder="••••••••" required />
    </label>

    <div class="row">
      <label class="checkbox">
        <input type="checkbox" name="remember" />
        <span>Remember me</span>
      </label>
      <a class="link" href="/forgot-password">Forgot password?</a>
    </div>

    <button class="btn btn-primary" type="submit">Sign In</button>

    <!-- Optional error message -->
    <!-- <div class="alert">Invalid credentials. Try again.</div> -->
  </form>
</div>
    
</body>
</html>