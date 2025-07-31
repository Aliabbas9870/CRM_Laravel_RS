<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assign Lead Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Summernote (optional) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">

    <style>
        .label-title {
            font-weight: 600;
            color: #555;
        }

        .info-box {
            background-color: #f8f9fa;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 0.75rem;
            border: 1px solid #dee2e6;
        }

        .comment-box {
            background-color: #fefefe;
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            max-height: 220px;
            overflow-y: auto;
            white-space: pre-wrap;
        }

        .card-header h4 {
            margin: 0;
        }

        .back-btn {
            display: inline-block;
            margin-bottom: 1rem;
        }

        textarea.form-control {
            resize: vertical;
        }
    </style>
</head>

<body>
    <div class="container py-4">
        <a href="{{ url()->previous() }}" class="btn btn-outline-dark back-btn">
            <i class="fas fa-arrow-left"></i> Back
        </a>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h4>Lead Profile Overview</h4>
            </div>
            <div class="card-body">
                <div class="row">

                    {{-- LEFT SIDE – Lead Details --}}
                    <div class="col-md-6">
                        <div class="info-box"><span class="label-title">📅 Date:</span> {{ \Carbon\Carbon::parse($task->created_at)->format('Y-m-d') }}</div>
                        <div class="info-box"><span class="label-title">📝 Title:</span> {{ $task->title }}</div>
                        <div class="info-box"><span class="label-title">👤 Name:</span> {{ $task->name }}</div>
                        <div class="info-box"><span class="label-title">📌 Note:</span> {{ $task->note }}</div>
                        <div class="info-box"><span class="label-title">📧 Email:</span> <a href="mailto:{{ $task->email }}">{{ $task->email }}</a></div>
                        <div class="info-box"><span class="label-title">📞 Phone:</span> {{ $task->phone }}</div>
                        <div class="info-box"><span class="label-title">🌐 Language:</span> {{ $task->language }}</div>
                        <div class="info-box"><span class="label-title">🌐 Url:</span> {{ $task->url }}</div>
                      <div class="info-box"><span class="label-title">🌍 Country:</span> {{ $task->country }}</div>


                        <div class="info-box"><span class="label-title">💬 Preference:</span> {{ $task->prefer_contact_type }}</div>
                        <div class="info-box"><span class="label-title">🕒 Last Update:</span> {{ $task->updated_at }}</div>
                        <div class="info-box"><span class="label-title">👨‍💼 Assigned To:</span> {{ $task->user->name ?? 'Not Assigned' }}</div>
                        <div class="info-box">
                            <span class="label-title">📊 Status:</span>
                            @if ($task->is_completed)
                                <span class="badge bg-success">Completed</span>
                            @else
                                <span class="badge bg-warning text-dark">In Process</span>
                            @endif
                        </div>
                    </div>

                    {{-- RIGHT SIDE – Comments --}}
                    <div class="col-md-6">
                        <form action="{{ route('task.addComment', $task->id) }}" method="POST">
                            @csrf
                            <label for="comment" class="form-label fw-bold">Add a Comment:</label>
                            <textarea name="comment" class="form-control" rows="3" placeholder="Write your comment..." required></textarea>
                            <button type="submit" class="btn btn-primary btn-sm mt-2">
                                <i class="fas fa-comment"></i> Submit Comment
                            </button>
                        </form>

                        <div class="mt-4">
                            <label class="fw-bold mb-1">🗒️ All Comments:</label>
                            <div class="comment-box">
                                {{ $task->comment }}
                            </div>
                        </div>
                    </div>

                </div> <!-- end row -->
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
</body>
</html>
