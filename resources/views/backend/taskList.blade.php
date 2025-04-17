@extends('backend.layout.main')
@section('title', 'Task List')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>Task List</h1>
        <small>Overview of all tasks</small>
    </section>

    <section class="content">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <h4>Task List</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Task Name</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Country</th>
                                <th>Description</th>
                                <th>Language</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->name }}</td>
                                    <td><a href="mailto:{{ $task->email }}">{{ $task->email }}</a></td>
                                    <td><a href="https://wa.me/{{ $task->number }}" target="_blank">{{ $task->number }}</a></td>
                                    <td>{{ $task->country }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->language }}</td>
                                    <td>{{ $task->created_at->format('Y-m-d') ?? 'N/A' }}</td>
                                    <td>
                                        @if($task->is_completed)
                                            <span class="badge badge-success">Complete</span>
                                        @else
                                            <span class="badge badge-warning">Incomplete</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$task->is_completed)
                                            <form action="{{ route('task.complete', $task->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-sm btn-primary">Mark as Complete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
