<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mailData['subject'] ?? 'Task Details' }}</title>
    <style>
        /* General Reset */
        body, h1, p {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }
        img {
            max-width: 100%;
            height: auto;
        }

        /* Email Container */
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        /* Header Section */
        .email-header {
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
        }
        .email-header h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        /* Body Section */
        .email-body {
            margin-top: 20px;
            font-size: 16px;
            line-height: 1.6;
            color: #555555;
            padding-bottom: 20px;
        }

        /* Footer Section */
        .footer {
            font-size: 14px;
            text-align: left;
            color: #777777;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eeeeee;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .email-container {
                width: 100%;
                padding: 15px;
            }
            .email-header h1 {
                font-size: 24px;
            }
            .email-body p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <div class="email-container">
        <!-- Header Section -->
        <div class="email-header">
            {{-- <h1>{{ $mailData['subject'] ?? 'Task Details' }}</h1> --}}
            <h1>Details</h1>
        </div>

        <!-- Body Section -->
        <div class="email-body">
            <p>{{ $mailData['message'] }}</p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>If you have any questions, feel free to reach out to us.</p>
            <br>
            <p>Best Regards, <br><strong>RS Team</strong></p>
        </div>
    </div>

</body>
</html>
