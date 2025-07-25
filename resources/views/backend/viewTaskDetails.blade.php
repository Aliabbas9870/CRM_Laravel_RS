<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Leads Details</title>

    <link rel="shortcut icon" href="backend/images/crmLogo.png" type="image/x-icon">
    <!-- Start Global Mandatory Style-->
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Favicon and touch icons -->
    {{--
    <link rel="shortcut icon" href="{{ url('backend/crmLogo.png') }}" type="image/x-icon"> --}}

    <link rel="shortcut icon" href="backend/images/crmLogo.png" type="image/x-icon">
    <!-- Start Global Mandatory Style-->
    <!-- jquery-ui css -->
    <link href="backend/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap -->
    <link href="backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap rtl -->
    <!--<link href="backend/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
    <!-- Lobipanel css -->
    <link href="backend/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css" />
    <!-- Pace css -->
    <link href="backend/plugins/pace/flash.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link href="backend/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Pe-icon -->
    <link href="backend/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css" />
    <!-- Themify icons -->
    <link href="backend/themify-icons/themify-icons.css" rel="stylesheet" type="text/css" />




    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mb-3">← Back</a>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Assign Leads Details</h4>
            </div>
            <div class="card-body">
<div class="row mb-3">
    {{-- LEFT SIDE – Task Details --}}
    <div class="col-md-6">
        <div class="mb-2"><strong>Date:</strong> {{ \Carbon\Carbon::parse($task->created_at)->format('Y-m-d') }}</div>
        <div class="mb-2"><strong>Title:</strong> {{ $task->title }}</div>
        <div class="mb-2"><strong>Name:</strong> {{ $task->name }}</div>
        <div class="mb-2"><strong>Note:</strong> {{ $task->description }}</div>
        <div class="mb-2"><strong>Email:</strong> <a href="mailto:{{ $task->email }}">{{ $task->email }}</a></div>
        <div class="mb-2"><strong>Phone:</strong> {{ $task->phone }}</div>
        <div class="mb-2"><strong>Language:</strong> {{ $task->language }}</div>
        <div class="mb-2"><strong>Preference:</strong> {{ $task->note }}</div>
        <div class="mb-2"><strong>Last Update:</strong> {{ $task->updated_at }}</div>
        <div class="mb-2"><strong>Assigned To:</strong> {{ $task->user->name ?? 'Not Assigned' }}</div>
        <div class="mb-2">
            <strong>Status:</strong>
            @if ($task->is_completed)
                <span class="badge bg-success">Completed</span>
            @else
                <span class="badge bg-warning text-dark">Inprocess</span>
            @endif
        </div>
    </div>

    {{-- RIGHT SIDE – Comments --}}
    <div class="col-md-6">
        <form action="{{ route('task.addComment', $task->id) }}" method="POST">
            @csrf
            <textarea name="comment" placeholder="Add a comment" class="form-control" rows="2" required></textarea>
            <button type="submit" class="btn btn-primary btn-sm mt-2">Add Comment</button>
        </form>

        <div class="mt-3">
            <strong>All Comments:</strong>
            <pre style="white-space: pre-wrap; max-height: 200px; overflow-y: auto; background: #f9f9f9; padding: 10px; border-radius: 5px; border: 1px solid #ddd;">
{{ $task->comment }}
            </pre>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
