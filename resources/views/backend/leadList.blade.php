@extends('backend.layout.main')
@section('title', 'Leads List')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-money"></i>
        </div>
        <div class="header-title">
            <h1>Leads</h1>
            <small>Leads List</small>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            <a href="#">
                                <h4>Leads list</h4>
                            </a>
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
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Country</th>
                                        <th>Notes</th>
                                        <th>Status</th>
                                        <th>Assign Task</th> <!-- Add this column for task assignment -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enquiry as $enquiry)
                                    <tr>
                                        <td>{{ $enquiry->created_at->format('Y-m-d') }}</td> <!-- Format the date -->
                                        <td>{{ $enquiry->name }}</td>
                                        <td>{{ $enquiry->email }}</td>
                                        <td>{{ $enquiry->phone }}</td>
                                        <td>{{ $enquiry->country }}</td>
                                        <td>{{ $enquiry->note }}</td>
                                        {{-- <td>{{ $enquiry->id }}</td> --}}
                                        <td class="text-center">
                                            @if($enquiry->status == 1)
                                            <span class="badge badge-success custom-badge">Active</span>
                                            @else
                                            <span class="badge badge-danger custom-badge">Disabled</span>
                                            @endif
                                        </td>

                                        <td>
                                            <form action="{{ url('/admin/enquiries/assign') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <!-- Dropdown to select a user -->
                                                    <select name="user_id" class="form-control" required>
                                                        <option value="" disabled selected>Select User</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <input type="hidden" name="enquiry_id" value="{{ $enquiry->id }}"> <!-- Pass the enquiry ID -->
                                                <button type="submit" class="btn btn-primary btn-sm">Assign Task</button>
                                            </form>
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

@endsection
