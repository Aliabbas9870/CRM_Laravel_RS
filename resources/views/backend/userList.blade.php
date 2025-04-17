@extends('backend.layout.main')
@section('title', 'User List')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-user"></i>
        </div>
        <div class="header-title">
            <h1>User Management</h1>
            <small>User List</small>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            <h4>User List</h4>
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
                                    <tr class="info">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                        {{-- <th>Actions</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr id="user-row-{{ $user->id }}">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                        <td class="text-center">
                                            @if($user->status == 0)
                                                <span class="badge badge-success custom-badge">Active</span>
                                            @else
                                                <span class="badge badge-danger custom-badge">Disabled</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group"
                                                style="display: flex; justify-content: center; gap: 5px;">

                                                <a href="/EditUser/{{ $user->id }}"
                                                    class="btn btn-info text-black text-bold">Edit</a>

                                                <form action="/DeleteUser/{{ $user->id }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this User?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                        {{-- <td class="text-center">
                                            @if($user->status == 1)
                                                <form action="{{ url('/users/disable/' . $user->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Disable</button>
                                                </form>
                                            @else
                                                <form action="{{ url('/users/enable/' . $user->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Enable</button>
                                                </form>
                                            @endif

                                            <button class="btn btn-danger btn-sm delete-user"
                                                data-id="{{ $user->id }}"
                                                title="Delete Record">
                                                Delete
                                            </button>
                                        </td> --}}
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
