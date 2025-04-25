<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h3 class="mb-4">Edit Task</h3>

    {{-- Debug example: <p>Email: {{ $task->email }}</p> --}}

    <form action="{{ route('task.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ old('title', $task->title) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name', $task->name) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email', $task->email) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="number">Phone Number</label>
            <input type="text" name="number" value="{{ old('number', $task->phone) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="language">Language</label>
            <input type="text" name="language" value="{{ old('language', $task->language) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea name="comment" class="form-control" rows="4">{{ old('comment', $task->comment) }}</textarea>
        </div>

        <div class="form-group">
            <label for="user_id">Assign To</label>
            <select name="user_id" class="form-control">
                <option value="">Not Assigned</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="is_completed">Status</label>
            <select name="is_completed" class="form-control">
                <option value="0" {{ !$task->is_completed ? 'selected' : '' }}>Pending</option>
                <option value="1" {{ $task->is_completed ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Task</button>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
