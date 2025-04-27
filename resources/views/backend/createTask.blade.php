<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRM | Create Task</title>
    <link rel="shortcut icon" href="backend/images/crmLogo.png" type="image/x-icon">
    <link rel="shortcut icon" href="backend/images/crmLogo.png" type="image/x-icon">


    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #3684d3; /* Light background color */
        }
        form{
            padding: 12px;
            margin: 12px;
        }
        .form-container {
            padding: 15px;
            margin: 15px;
            background-color: #ffffff; /* White background for the form */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        h2 {
            color: #343a40; /* Darker heading color */
        }
        .btn-primary {
            background-color: #007bff; /* Bootstrap primary color */
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker on hover */
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <section class="content-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="header-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="header-title text-light h2">Create Task
                    <h1 class="text-white"></h1>
                </div>
                <a href="/admin" class="btn btn-success btn-back">Back to Admin</a>
            </div>
        </section>

        <div class="form-container p-4">
            <form action="{{ route('admin.tasks.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Task Title</label>
                    <input type="text" name="title" class="form-control" required
                        value="{{ old('title', $data['title'] ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" required value="{{ old('email', $data['email'] ?? '') }}">


                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $data['description'] ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="user_id" class="form-label">Assign to User</label>
                    <select name="user_id" class="form-select">
                        <option value="">Select User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Number</label>
                        <input type="text" name="phone" class="form-control"
                            value="{{ old('phone', $data['phone'] ?? '') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="note" class="form-label">Prefer contact</label>
                        <input type="text" name="note" class="form-control"
                            value="{{ old('contact_type=', $data['contact_type'] ?? '') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control"
                            value="{{ old('name', $data['name'] ?? '') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" name="country" class="form-control"
                            value="{{ old('country', $data['country'] ?? '') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="language" class="form-label">Language</label>
                    <input type="text" name="language" class="form-control"
                        value="{{ old('language', $data['language'] ?? '') }}">
                </div>

                <button type="submit" class="btn btn-primary w-100">Create Task</button>
            </form>
        </div>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
