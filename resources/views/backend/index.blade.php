<!-- Developer : Ali Abbas -->
<!-- Laravel : Admin Panel-->
<!-- Date : 16/4/2025-->


@extends('backend.layout.main')
@section('title', 'Home')
@section('content')

<style>
    .custom-badge1 {
        font-size: 14px;
        /* Adjust font size as needed */
        padding: 8px 12px;
        /* Add some padding for better appearance */
        border-radius: 0.25rem;
        /* Optional: control the border radius */
        cursor: pointer;
        /* Change cursor to pointer on hover */
    }

    .custom-badge.bg-danger1 {
        background-color: #dc3545;
        /* Bootstrap danger color */
        color: #fff;
        /* White text color for contrast */
    }
</style>

<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-dashboard"></i>
        </div>
        <div class="header-title">
            <h1>Admin Dashboard</h1>
            <small>Very detailed & featured admin.</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 text-center">
                <div id="cardbox1">
                    <div class="statistic-box">
                        <i class=" fa-3x"></i>
                        <div class="counter-number pull-right">
                            <!-- <span class="count-number">11</span>  -->
                            <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                            </span>
                        </div>
                        <h3> Enquires</h3>
                        <h2>
                            <span class="count-number text-center " style="color: aliceblue;">{{ $TotalEnqury }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 text-center">
                <div id="cardbox2">
                    <div class="statistic-box">
                        <i class="fa-3x"></i>
                        <div class="counter-number pull-right">
                            <!-- <span class="count-number">4</span>  -->
                            <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                            </span>
                        </div>
                        <h3> Active Admin</h3>
                        <h2>
                            <span class="count-number text-center" style="color: aliceblue;">{{ $TotalAdminModel
                                }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 text-center">
                <div id="cardbox2">
                    <div class="statistic-box">
                        <i class="fa-3x"></i>
                        <div class="counter-number pull-right">
                            <!-- <span class="count-number">4</span>  -->
                            <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                            </span>
                        </div>
                        <h3> Total Task</h3>
                        <h2>
                            <span class="count-number text-center" style="color: aliceblue;">{{ $taskTotal
                                }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 text-center">
                <div id="cardbox2">
                    <div class="statistic-box">
                        <i class="fa-3x"></i>
                        <div class="counter-number pull-right">
                            <!-- <span class="count-number">4</span>  -->
                            <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                            </span>
                        </div>
                        <h3> Incomplete Task</h3>
                        <h2>
                            <span class="count-number text-center" style="color: aliceblue;">{{ $incompleteTasksCount
                                }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 text-center">
                <div id="cardbox2">
                    <div class="statistic-box">
                        <i class="fa-3x"></i>
                        <div class="counter-number pull-right">
                            <!-- <span class="count-number">4</span>  -->
                            <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                            </span>
                        </div>
                        <h3> Complete Task</h3>
                        <h2>
                            <span class="count-number text-center" style="color: aliceblue;">{{ $completedTasksCount
                                }}</span>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 text-center">
                <div id="cardbox4">
                    <div class="statistic-box">
                        <i class=" fa-3x"></i>
                        <div class="counter-number pull-right">
                            <!-- <span class="count-number">11</span>  -->
                            <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                            </span>
                        </div>
                        <h3> Total Team Member</h3>
                        <span class="count-number text-center" style="color: aliceblue;">{{ $TotalTeamMember }}</span>

                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <!-- Single row with "Create Task" and "Show Tasks" buttons -->
            <div class="d-flex justify-content-between m-3 ">
                <h1></h1>
                <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary btn-sm ">Create Task</a>
                {{-- <button onclick="toggleTasks()" class="btn btn-success btn-sm m-3">Show Assign Tasks</button> --}}
            </div>
            <h1></h1>

            <!-- Task table section -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            <a href="#">
                                <h4>Task List</h4>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="info">
                                        <th style="width: 12%;">Date</th>
                                        {{-- <td>
                                            <a href="{{ route('user.compose.email', ['email' => $task->email]) }}" title="Send Email">
                                                <i class="fa fa-envelope fa-2x"></i>
                                            </a>
                                        </td> --}}
                                        <th style="width: 14%;">Task Title</th>
                                        <th style="width: 14%;">Name</th>
                                        <th style="width: 15%;">Email</th>
                                        <th style="width: 10%;">Phone</th>
                                        <th style="width: 10%;">Language</th>
                                        <th style="width: 10%;">Comments</th>
                                        <th style="width: 10%;">Assigned To</th>
                                        <th style="width: 5%;">Status</th>
                                        <th style="width: 5%;">Action</th>
                                        {{-- <th class="text-center" style="width: 10%;">Actions</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks->sortByDesc('created_at') as $task)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($task->created_at)->format('Y-m-d') }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $task->email }}?subject=Hello&body=Hello, how are you?">
                                                {{ $task->email }}
                                            </a>
                                        </td>
                                        {{--  <td>
                                            <a href="https://wa.me/{{ $task->number }}" target="_blank">
                                                {{ $task->number }}
                                            </a>
                                        </td>  --}}


                                        <td>
                                            @if($task->number)
                                                <div style="display: flex; gap: 15px;">
                                                    {{-- <a href="https://wa.me/{{ $task->number }}" target="_blank" title="Open WhatsApp">
                                                        <i class="fa fa-whatsapp fa-2x"></i>
                                                    </a> --}}

                                                    <a href="{{ route('send.whatsapp', ['number' => $task->number]) }}" title="Send WhatsApp Message">
                                                        <i class="fa fa-whatsapp fa-2x"></i>
                                                    </a>

                                                    <a href="tel:{{ $task->number }}" title="Call">
                                                        <i class="fa fa-phone fa-2x"></i>
                                                    </a>
                                                </div>
                                            @else
                                                <div style="display: flex; gap: 15px;">
                                                    <i class="fa fa-whatsapp fa-2x text-muted" title="No number available"></i>
                                                    <i class="fa fa-phone fa-2x text-muted"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $task->language }}</td>
                                        <td style="max-width: 300px; padding: 0;">
                                            <div style="max-height: 60px; overflow-y: auto;">
                                                {!! nl2br(e($task->comment)) !!}
                                            </div>
                                        </td>


                                        <td>
                                            {{ $task->user->name ?? 'Not Assigned' }}

                                            <a href="{{ route('admin.compose.email', ['email' => $task->user->email]) }}" title="Send Email">
                                                <i class="fa fa-envelope fa-2x"></i>
                                            </a>



                                        </td>
                                        <td class="text-center">
                                            @if($task->is_completed)
                                                <span class="badge badge-success custom-badge">Completed</span>
                                            @else
                                                <span class="badge badge-danger custom-badge">Panding</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" style="display: flex; justify-content: center; gap: 5px;">
                                                <a href="{{ route('task.edit', $task->id) }}" class="btn btn-info text-black text-bold">Edit</a>
                                                <form action="{{ route('task.delete', $task->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            <a href="#">
                                <h4>Leads list</h4>
                            </a>
                        </div>
                    </div>
                    {{-- @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@elseif ($errors->any())
    <div class="alert alert-danger" role="alert">
        {{ $errors->first() }}
    </div>
@endif --}}


<!-- Your existing table for displaying emails -->
<div class="panel-body">


    <!-- Table to display emails with checkboxes -->
    <div class="table-responsive">
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

        @php
$currentSort = request('sort', 'desc'); // Get current sort order, default to 'desc'
@endphp

          {{-- ✅ Sorting Buttons (Correct Position) --}}
          <div class="mb-3 d-flex justify-content-end">
            <!-- Button to send selected emails -->
            <button id="send-selected-emails" class="btn btn-primary mb-3">Send Email to Selected</button>
            <a href="{{ route('admin.index', ['sort' => 'asc']) }}" class="btn btn-primary btn-sm me-2"> Ascending</a>
<a href="{{ route('admin.index', ['sort' => 'desc']) }}" class="btn btn-sm {{ $currentSort == 'desc' ? 'btn-success' : 'btn-secondary' }}"> Descending </a>

        </div>
        <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr class="info">
                    <th style="width: 5%;"><input type="checkbox" id="select-all"></th>
                    <th style="width: 12%;">Date</th>
                    <th style="width: 14%;">Name</th>
                    <th style="width: 15%;">Email</th>
                    <th style="width: 10%;">Phone</th>
                    <th style="width: 10%;">Url</th>
                    <th style="width: 10%;">Country</th>
                    {{--  <th style="width: 10%;">From</th>  --}}
                    <th style="width: 5%;">Status</th>
                    <th class="text-center" style="width: 10%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enquiry as $enquiry)
                    <tr>
                        <td><input type="checkbox" class="email-checkbox" value="{{ $enquiry->email }}"></td>
                        <td>{{ \Carbon\Carbon::parse($enquiry->created_at)->format('Y-m-d') }}</td>
                        <td>{{ $enquiry->name }}</td>
                        <td>{{ $enquiry->email }}</td>
                        <td>{{ $enquiry->phone }}</td>
                        <td>{{ $enquiry->url }}</td>
                        <td>{{ $enquiry->country }}</td>
                        {{--  <td>{{ $enquiry->from }}</td>  --}}
                        <td class="text-center">
                            <span class="badge custom-badge {{ $enquiry->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                {{ $enquiry->status == 1 ? 'Active' : 'Disabled' }}
                            </span>
                        </td>
                        <td>
                            <a href="/EditRecordLead/{{ $enquiry->id }}" class="btn btn-info text-black font-weight-bold">Edit</a>
                            <form action="/DeleteRecordLead/{{ $enquiry->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this lead?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Hidden form for email submission -->
<form id="email-form" action="{{ route('send-email-form') }}" method="POST" style="display:none;">
    @csrf
    <input type="hidden" name="email[]" id="emails-input">
    <button type="submit" id="submit-email-form"></button>
</form>

<script>
document.getElementById('select-all').addEventListener('change', function() {
    const isChecked = this.checked;
    document.querySelectorAll('.email-checkbox').forEach(checkbox => {
        checkbox.checked = isChecked;
    });
});

document.getElementById('send-selected-emails').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default button behavior

    const selectedEmails = [];
    document.querySelectorAll('.email-checkbox:checked').forEach(checkbox => {
        selectedEmails.push(checkbox.value);
    });

    if (selectedEmails.length > 0) {
        // Set the selected emails in the hidden input field as a JSON string
        document.getElementById('emails-input').value = JSON.stringify(selectedEmails);

        // Ensure the form action is set to the correct URL for handling email submission
        const emailForm = document.getElementById('email-form');
        emailForm.action = '/send-email-form';  // Set the appropriate action URL if not already set

        // Log the emails for debugging
        console.log('Selected Emails:', selectedEmails);

        // Submit the form
        emailForm.submit();  // This will trigger the form submission
    } else {
        alert('Please select at least one email.');
    }
});
</script>









                </div>
            </div>


{{-- <script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#select-all').addEventListener('click', function () {
        const checkboxes = document.querySelectorAll('.email-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });

    document.querySelector('#send-selected-emails').addEventListener('click', function () {
        const selectedEmails = [];
        document.querySelectorAll('.email-checkbox:checked').forEach(checkbox => {
            selectedEmails.push(checkbox.value);
        });

        if (selectedEmails.length > 0) {
            const emailQuery = selectedEmails.join(',');
            window.location.href = '/send-email-form?email=' + encodeURIComponent(emailQuery);
        } else {
            alert('Please select at least one email to send.');
        }
    });

    document.querySelectorAll('.send-email-btn').forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const email = button.getAttribute('data-email');
            window.location.href = '/send-email-form?email=' + encodeURIComponent(email);
        });
    });
}); --}}


</>
        </div>









        <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@if(session('success'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
alert("{{ session('success') }}");
});
</script>
@endif

@endsection
