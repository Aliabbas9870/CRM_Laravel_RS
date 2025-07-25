@extends('frontend.layout.main')

@section('title', 'User Home')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-dashboard"></i>
            </div>
            <div class="header-title">
                <h1>User Dashboard</h1>
                <small>Detailed & featured User.</small>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- Total Assigned Tasks -->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 text-center">
                    <div id="cardbox1">
                        <div class="statistic-box">
                            <i class="fa fa-tasks fa-3x"></i>
                            <h3>Total Assigned Tasks: <span>{{ $totalTasksCount }}</span></h3>
                        </div>
                    </div>
                </div>

                <!-- Incomplete Tasks -->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 text-center">
                    <div id="cardbox2">
                        <div class="statistic-box">
                            <i class="fa fa-tasks fa-3x"></i>
                            <h3>Incomplete Tasks: <span style="color: red;">{{ $incompleteTasksCount }}</span></h3>
                        </div>
                    </div>
                </div>

                <!-- Completed Tasks -->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 text-center">
                    <div id="cardbox3">
                        <div class="statistic-box">
                            <i class="fa fa-tasks fa-3x"></i>
                            <h3>Completed Tasks: <span style="color: rgb(235, 233, 241);">{{ $completedTasksCount }}</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
<div id="scrollbar-top">
  <div></div>
</div>

            <!-- Task Table -->
            <div id="table-wrapper">
            <table class="table table-bordered text-center mt-4">
                <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Country</th>
                        <th>Phone</th>
                        <th>Description</th>
                        <th>Language</th>
                        <th>Prefer Contact</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Comments</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tasks->where('is_completed', 0)->sortByDesc('created_at') as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->name }}</td>
                            <td>
                                <a href="{{ route('user.compose.email', ['email' => $task->email]) }}" title="Send Email">
                                    <i class="fa fa-envelope fa-2x">  </i>
                                    {{ $task->email }}
                                </a>

                            </td>
                            <td>
                                @if ($task->phone)
                                    <div style="display: flex; gap: 15px;">
                                        <a href="https://wa.me/{{ $task->phone }}" target="_blank"
                                            title="Send WhatsApp Message">
                                            <i class="fa fa-whatsapp fa-2x text-success"></i>
                                        </a>
                                        <a href="tel:{{ $task->phone }}" title="Call">
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
                            <td>{{ $task->country }}</td>
                            <td>
                                <a href="tel:{{ $task->phone }}" title="Call">
                                    {{ $task->phone }}
                                </a>
                          </td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->language }}</td>
                            <td>{{ $task->note }}</td>

                            <td>{{ $task->created_at ? $task->created_at->format('Y-m-d') : 'N/A' }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm">Incomplete</button>
                            </td>
                            {{--  <td>
                                <form action="{{ route('task.addComment', $task->id) }}" method="POST">
                                    @csrf
                                    <textarea name="comment" placeholder="Add a comment" class="form-control" rows="3" required></textarea>
                                    <button type="submit" class="btn btn-primary btn-sm mt-1">Submit</button>
                                </form>
                            </td>  --}}

                                               <td style="vertical-align: top; min-width: 200px;">
    {{-- Add New Comment --}}
    <form action="{{ route('task.addComment', $task->id) }}" method="POST">
        @csrf
        <textarea name="comment" placeholder="Add a comment" class="form-control" rows="2" required></textarea>
        <button type="submit" class="btn btn-primary btn-sm mt-1">Add</button>
    </form>

    {{-- Show All Comments (formatted, scrollable) --}}
    <div style="
        max-height: 4.9em;
        overflow-y: auto;
        margin-top: 5px;
        border: 1px solid #ddd;
        padding: 5px;
        background: #f9f9f9;
        border-radius: 5px;
        line-height: 1.8em;
        font-size: 13px;
        white-space: pre-wrap;
    ">
        {{ $task->comment }}
    </div>
</td>



                            <td>
                                <form action="{{ route('task.complete', $task->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm" style="background-color: #009688; color: white;">Mark as
                                        Complete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        </section>
    </div>
<script>
  const topScrollbar = document.getElementById('scrollbar-top');
  const tableWrapper = document.getElementById('table-wrapper');

  // Sync scroll positions both ways
  topScrollbar.addEventListener('scroll', () => {
    tableWrapper.scrollLeft = topScrollbar.scrollLeft;
  });

  tableWrapper.addEventListener('scroll', () => {
    topScrollbar.scrollLeft = tableWrapper.scrollLeft;
  });
</script>
@endsection
