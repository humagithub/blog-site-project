<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - My Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg,rgb(105, 133, 175), #c9d6ff);
            height: 100vh;
        }
        .login-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            background: white;
            padding: 2rem;
        }
        .login-title {
            font-weight: 700;
            color: #343a40;
        }
    </style>
</head>
<body>
    <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-md-4">
            <div class="login-card">
                <h3 class="text-center login-title mb-4">Welcome Back 👋</h3>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>

                @if ($errors->any())
                    <div class="alert alert-danger mt-3 mb-0">
                        <strong>Oops!</strong> Please fix the following issues:
                        <ul class="mb-0 mt-1">
                            @foreach ($errors->all() as $error)
                                <li class="small">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="text-center mt-3">
                    <small class="text-muted">Don't have an account? <a href="{{ route('register') }}">Sign up</a></small>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
