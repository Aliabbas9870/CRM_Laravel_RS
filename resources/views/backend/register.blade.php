<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Registration</title>

    <link rel="shortcut icon" href="backend/images/crmLogo.png" type="image/x-icon">

    <!-- Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Pe-icon CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/pe-icon-7-stroke/1.2.0/pe-icon-7-stroke.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            font-family: 'Arial', sans-serif;
        }

        .login-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            position: relative; /* Added for positioning */
        }

        .login-area {
    background: linear-gradient(to bottom right, #4a90e2, #007bff);
    color: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    width: 400px;
}

        .header-icon {
            font-size: 40px;
            color: #6a11cb;
        }

        .btn-add {
            background-color: #6a11cb;
            color: white;
        }

        .btn-add:hover {
            background-color: #2575fc;
        }

        .form-control {
            border-radius: 5px;
        }

        .alert {
            margin-bottom: 20px;
        }

        .admin-login-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1000; /* Ensure it stays above other elements */
        }
    </style>

</head>

<body>
<br>
<a href="/admin" class="btn btn-primary btn-back p-2 m-3">Back to Admin</a>
    <br><br><br><br><br>
    <div class="container">
        <h2 class="text-center text-white">Register User</h2>

        <!-- Success message -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        <ul>
            <li>{{ session('success') }}</li>
        </ul>
    </div>
@endif
<br><br><br>

        <form method="POST" action="{{ route('user.register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email') }}"    >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>



            <button type="submit" class="btn btn-primary">Register User</button>
        </form>
    </div>

    <!-- Include your JS files -->
</body>

</html>
