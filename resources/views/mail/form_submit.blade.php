<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thank You for Contacting RS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
    </style>
</head>
<body>
    <h2>Dear {{ $details['name'] }},</h2>

    <p>Thank you so much for your interest in our services. We have received your message and would like to assure you that our team will be in touch with you very soon.</p>

    <p><strong>Your Provided Details:</strong></p>
    <ul>
        <li><strong>Email:</strong> {{ $details['email'] }}</li>
    </ul>

    <p>If you have any urgent queries, feel free to reply to this email.</p>

    <p>Best regards,<br>
    <strong>RS Team</strong></p>
</body>
</html>
