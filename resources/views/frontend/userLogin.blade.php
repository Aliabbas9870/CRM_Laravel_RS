<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login</title>

    <link rel="shortcut icon" href="backend/images/crmLogo.png" type="image/x-icon">

    <!-- Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .login-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(to right, #6a11cb, #2575fc);
        }

        .login-area {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .btn-add {
            background-color: #6a11cb;
            color: white;
        }

        .btn-add:hover {
            background-color: #2575fc;
        }

        .alert {
            margin-bottom: 20px;
        }

        .admin-login-btn {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
</head>

<body>
    <div class="login-wrapper">
        <!-- Admin Login Button -->
        <a href="/admin/login" class="btn btn-add admin-login-btn">Admin Login</a>

        <div class="login-area">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="text-center mb-4">
                <h3>User Login</h3>
                <small><strong>Please enter your credentials to login.</strong></small>
            </div>

            <form method="POST" action="/user/login">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="example@gmail.com" name="email" class="form-control" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="******" name="password" class="form-control" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-add btn-lg w-50">Login</button>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
