<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compose Email</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="backend/images/crmLogo.png" type="image/x-icon">
    <script>
        var link = document.createElement('link');
        link.rel = 'icon';
        link.href = 'backend/images/crmLogo.png';
        link.type = 'image/x-icon';
        document.head.appendChild(link);
      </script>
</head>
<body>

<!-- Main Content Wrapper -->
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <!-- Back Button on the top left side -->
            <a href="{{ url('/admin') }}" class="btn btn-info btn-md btn-lg">  Back</a>

            <h3 class="mt-3">Compose Email</h3>
            <p>Send an email to the selected recipient.</p>
        </div>
        <div class="card-body">
            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Email Form -->
            <form action="{{ route('admin.send.email') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- To Email Field -->
                <div class="mb-3">
                    <label for="to_email" class="form-label">To Email</label>
                    <input type="email" name="to_email" class="form-control" value="{{ $email }}" required>
                </div>

                <!-- Subject Field -->
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" name="subject" class="form-control" required>
                </div>

                <!-- Message Field -->
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="5" placeholder="Write your message here" required></textarea>
                </div>

                <!-- Attachment Field -->
                <div class="mb-3">
                    <label for="attachment" class="form-label">Attachment (Optional)</label>
                    <input type="file" name="attachment" class="form-control">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success w-100">Send Email</button>
            </form>

            <!-- Back Button at the bottom (optional) -->
            {{-- <a href="{{ url('/user') }}" class="btn btn-secondary mt-3 w-100">Back</a> --}}
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS and Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
