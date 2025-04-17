<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            max-width: 900px;
            margin: auto;
        }

        .form-control,
        .btn {
            border-radius: 5px;
        }

        label {
            font-weight: bold;
        }

        .alert {
            font-size: 1.1rem;
        }

        textarea.form-control {
            height: 150px;
        }

        .email-field {
            margin-bottom: 10px;
        }

        .remove-btn {
            cursor: pointer;
            color: red;
            font-size: 18px;
            margin-left: 5px;
        }

        .email-input-container {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .email-list p {
            cursor: pointer;
            color: #007bff;
            text-decoration: none;
            margin: 0;
        }

        .email-list p:hover {
            text-decoration: none;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .back-btn {
            margin-bottom: 20px;
            font-size: 18px;
            color: #007bff;
            text-decoration: none;
        }

        .back-btn:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .card {
                width: 100%;
            }

            .email-input-container {
                gap: 15px;
            }

            .email-table {
                width: 100%;
                font-size: 14px;
            }
        }
    </style>
</head>

<body class="container my-5">
    <!-- Back to Admin Button -->
    <a href="{{ url('/admin') }}" class="back-btn">← Back to Admin</a>

    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <!-- Left Column: Email List -->
                <div class="col-md-6">
                    <h3>Email Addresses</h3>
                    <div class="email-list">
                        @foreach($to_emails as $email)
                            @php
                                $cleanedEmail = str_replace(['[', ']', '"'], '', $email);
                                $emailList = explode(',', $cleanedEmail);
                            @endphp
                            @foreach($emailList as $emailItem)
                                <p onclick="addEmailToInput('{{ trim($emailItem) }}')">{{ trim($emailItem) }}</p>
                            @endforeach
                        @endforeach
                    </div>
                </div>

                <!-- Right Column: Form -->
                <div class="col-md-6">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @elseif($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('send.custom.email') }}" enctype="multipart/form-data">
                        @csrf
                        <label for="to_emails">Email Addresses:</label>
                        <div id="email-container" class="email-input-container">
                            <!-- Input fields for emails will be added here -->
                        </div>

                        <button type="button" class="btn btn-secondary" onclick="addEmailField()">Add Email</button>

                        <br><br>

                        <label for="subject">Subject:</label>
                        <input type="text" name="subject" class="form-control" required>

                        <label for="message">Message:</label>
                        <textarea name="message" class="form-control" required></textarea>

                        <label for="attachment">Attachment:</label>
                        <input type="file" name="attachment" class="form-control">

                        <button type="submit" class="btn btn-primary mt-3">Send Email</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to add new email input fields dynamically
        function addEmailField() {
            createEmailInput('');
        }

        // Function to create and append an input field for an email
        function createEmailInput(email) {
            var emailContainer = document.getElementById('email-container');
            var newEmailField = document.createElement('div');
            newEmailField.classList.add('email-field');

            var newInput = document.createElement('input');
            newInput.type = 'email';
            newInput.name = 'to_emails[]'; // Use array syntax for multiple emails
            newInput.classList.add('form-control');
            newInput.placeholder = 'Enter email address';
            newInput.value = email; // Pre-fill with email if provided

            var removeBtn = document.createElement('span');
            removeBtn.classList.add('remove-btn');
            removeBtn.innerHTML = '&times;';
            removeBtn.onclick = function() {
                emailContainer.removeChild(newEmailField);
            };

            newEmailField.appendChild(newInput);
            newEmailField.appendChild(removeBtn);
            emailContainer.appendChild(newEmailField);
        }

        // Function to handle clicking on an email and adding it as a new input field
        function addEmailToInput(email) {
            // Check if the email is already in an input field
            var emailContainer = document.getElementById('email-container');
            var inputs = emailContainer.getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].value === email) {
                    alert('This email is already selected.');
                    return;
                }
            }

            // If not found, add the email as a new input field
            createEmailInput(email);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
