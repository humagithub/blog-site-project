<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    
    <!-- Internal CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 500px;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .nav-tabs .nav-link {
            color: #007bff;
            font-weight: bold;
        }

        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: white;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn {
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545;
        }
    </style>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <ul class="nav nav-tabs" id="registerTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#user">Register as User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#writer">Register as Writer</a>
            </li>
           
        </ul>

        <div class="tab-content mt-3">
            <!-- User Registration -->
            <div class="tab-pane fade show active" id="user">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" name="usertype" value="user">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>

                    <button type="submit" class="btn btn-primary w-100">Register as User</button>
                    <a href="{{ url('auth/google') }}" class="btn btn-danger w-100 mb-3">
    <i class="fab fa-google me-2"></i> Continue with Google
</a>

                </form>
            </div>

            <!-- Writer Registration -->
            <div class="tab-pane fade" id="writer">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" name="usertype" value="writer">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>

                    <button type="submit" class="btn btn-success w-100">Register as Writer</button>

            </div>

            
          

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
