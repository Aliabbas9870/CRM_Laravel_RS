@extends('frontend.layout.main')
@section('title', 'Task List')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-user"></i>
        </div>
        <div class="header-title">
            <h1>Task</h1>
            <small>Task List</small>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            <h4>Task List</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(session('success'))
                            <script>
                                Swal.fire({
                                    title: 'Success!',
                                    text: '{{ session("success") }}',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                });
                            </script>
                        @endif

                        <div class="table-responsive">
                            <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
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

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->title }}</td>

                                        <td>{{ $task->name }}</td>

                                        <td>
                                            {{-- Make the email clickable to open the default email client with a predefined message --}}
                                            <a href="mailto:{{ $task->email }}?subject=Hello&body=Hello, how are you?">
                                                {{ $task->email }}
                                            </a>
                                        </td>
                                        <td>
                                            {{-- Make the phone number clickable to open WhatsApp --}}
                                            <a href="https://wa.me/{{ $task->phone }}" target="_blank">
                                                {{ $task->phone }}
                                            </a>
                                        </td>
                                        <td>{{ $task->country }}</td>

                                        <td>{{ $task->description }}</td>
                                        <td>{{ $task->language }}</td>


                                        <td>{{ $task->created_at ? $task->created_at->format('Y-m-d') : 'N/A' }}</td>
                                        <td>
                                            @if($task->is_completed)
                                                <button class="btn btn-success btn-sm">Complete</button>
                                            @else
                                                <button class="btn btn-warning btn-sm">Incomplete</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$task->is_completed)
                                            <form action="{{ route('task.complete', $task->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-sm" style="background-color: #009688; color: white;">Mark as Complete</button>
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
            </div>
        </div>
    </section>
</div>

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.delete-user', function() {
        var userId = $(this).data('id');
        var row = $('#user-row-' + userId); // Get the row to be removed


        // Confirm deletion
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/users/delete/' + userId,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Remove the row from the table
                        row.remove();
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        );
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Error!',
                            'There was an error deleting the user.',
                            'error'
                        );
                    }
                });
            }
        });
    });
</script>
@endsection

@endsection
