<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mailData['subject'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h1 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            color: #34495e;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .footer {
            font-size: 14px;
            color: #7f8c8d;
            text-align: left;
        }
        .footer a {
            color: #2980b9;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        {{-- <h1>{{ $mailData['subject'] }}</h1> --}}
        <p>{{ $mailData['message'] }}</p>
        <p class="footer">Best Regards,<br>RS Admin</p>
    </div>
</body>
</html>
