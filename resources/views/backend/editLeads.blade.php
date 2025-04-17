<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Leads</title>
    <link rel="icon" href="backend/images/crmLogo.png" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .content-wrapper {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header-title h1 {
            font-size: 24px;
            font-weight: bold;
            color: #343a40;
        }
        .form-floating > label {
            font-size: 14px;
            font-weight: 600;
        }
        .text-danger {
            font-size: 12px;
            margin-top: 5px;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
        }
        .btn-back {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

@if ($message = Session::get('success'))
    <script>
        window.onload = function() {
            alert('{{ $message }}');
        };
    </script>
@endif

<div class="content-wrapper">
    <section class="content-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="header-icon">
                <i class="fa fa-users"></i>
            </div>
            <div class="header-title">
                <h1>Edit Leads</h1>
            </div>
            <a href="/admin" class="btn btn-primary btn-back">Back to Admin</a>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-body">
                        <form method="POST" action="/EditRecordLead/{{ $lead->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-floating mb-3">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" placeholder="Enter Name" name="name" value="{{ old('name', $lead->name) }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" placeholder="Enter Email" name="email" value="{{ old('email', $lead->email) }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <label for="phone">Phone</label>
                                <input class="form-control" type="text" placeholder="Enter Phone" name="phone" value="{{ old('phone', $lead->phone) }}" required>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <label for="country">Country</label>
                                <input class="form-control" type="text" placeholder="Enter Country" name="country" value="{{ old('country', $lead->country) }}" required>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <label for="prefer_contact_type">Preferred Contact Type</label>
                                <input class="form-control" type="text" placeholder="Enter Preferred Contact Type" name="prefer_contact_type" value="{{ old('prefer_contact_type', $lead->prefer_contact_type) }}">
                                @error('prefer_contact_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <label for="note">Note</label>
                                <textarea class="form-control" placeholder="Enter Note" name="note">{{ old('note', $lead->note) }}</textarea>
                                @error('note')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <label for="from">From</label>
                                <input class="form-control" type="text" placeholder="Enter Source" name="from" value="{{ old('from', $lead->from) }}">
                                @error('from')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- <div class="form-floating mb-3">
                                <label for="url">URL</label>
                                <input class="form-control" type="url" placeholder="Enter URL" name="url" value="{{ old('url', $lead->url) }}">
                                @error('url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}

                            <div class="mt-4">
                                <div class="d-grid">
                                    <button class="btn btn-success w-100" type="submit">Update Lead</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
