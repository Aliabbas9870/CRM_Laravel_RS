<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twilio SMS & Call Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJx3Nf9h2Vf5tCzFS2Kj98fYj3s9l0kwDNOjwiM6ijG5g0V1M1L7L0Q5tu5S" crossorigin="anonymous">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 30px;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .form-label {
            font-weight: 600;
            color: #555;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: none;
            padding: 15px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
        }

        button:hover {
            background-color: #0056b3;
        }

        .card-footer {
            text-align: center;
            padding: 15px;
        }

        .alert {
            font-size: 14px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Twilio SMS & Call Test</h1>

        <!-- Success or Error Message -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            <!-- SMS Form -->
            <div class="col-md-6 offset-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-3">Send Twilio SMS</h2>
                        <form action="/SMS" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="to" class="form-label">Phone Number (without country code):</label>
                                <input type="text" name="to" id="to" class="form-control" placeholder="e.g., 321670XXXX" required>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Message:</label>
                                <textarea name="message" id="message" class="form-control" rows="5" placeholder="Write your message here..." required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Send SMS</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Call Form -->
            <div class="col-md-6 offset-md-3 mt-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-3">Make Twilio Call</h2>
                        <form action="/Call" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="to" class="form-label">Phone Number (without country code):</label>
                                <input type="text" name="to" id="to" class="form-control" placeholder="e.g., 321670XXXX" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Make Call</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybFps2eH5Y/4kPnbfFwCSlVX3oC3D6V5DgmdE/Xtb0kH49K8J" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0noB4d5WqweBeY1nD82FF3VjMXHgY3FSVzz3qM9zv3g5pa6j" crossorigin="anonymous"></script>
</body>

</html>
