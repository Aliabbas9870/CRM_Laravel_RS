
<!-- Developer : Ali Abbas -->
<!-- Laravel : Admin Panel-->
<!-- Date : 17/5/2025-->

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

                        @php
    $currentSort = request('sort', 'desc'); // Get current sort order, default to 'desc'
@endphp





                        {{-- ✅ Sorting Buttons (Correct Position) --}}
                        <div class="mb-3 d-flex justify-content-end">
                            <a href="{{ route('admin.leadList', ['sort' => 'asc']) }}" class="btn btn-primary btn-sm me-2"> Ascending</a>
                            <a href="{{ route('admin.leadList', ['sort' => 'desc']) }}"
                                class="btn btn-sm {{ $currentSort == 'desc' ? 'btn-success' : 'btn-secondary' }}">
                                Descending
                             </a>
                        </div>

                        <div class="table-responsive">
                            <table id="dataTableExample1" class="table table-bordered table-striped table-hover" style="width:100%; table-layout: fixed;">

                                <thead>
                                    <tr class="info">
                                        <th style="width: 8%;">Date</th>
                                        <th style="width: 8%;">Assign</th>
                                        <th style="width: 14%;">Name</th>
                                        <th style="width: 16%;">Email</th>
                                        <th style="width: 12%;">Phone</th>
                                        <th style="width: 8%;">Prefer Contact</th>
                                        <th style="width: 10%;">Country</th>
                                        <th style="width: 15%; word-break: break-word;">Url</th>
                                        <th style="width: 12%; word-break: break-word;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enquiry as $enquiry)
                                        <tr>
                                            <td>{{ $enquiry->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <form action="{{ route('admin.tasks.create') }}" method="GET">
                                                    <input type="hidden" name="name" value="{{ $enquiry->name }}">
                                                    <input type="hidden" name="email" value="{{ $enquiry->email }}">
                                                    <input type="hidden" name="phone" value="{{ $enquiry->phone }}">
                                                    <input type="hidden" name="country" value="{{ $enquiry->country }}">
                                                    <input type="hidden" name="url" value="{{ $enquiry->url }}">
                                                    <input type="hidden" name="contact_type" value="{{ $enquiry->prefer_contact_type }}">
                                                    <input type="hidden" name="note" value="{{ $enquiry->note }}">
                                                    <input type="hidden" name="status" value="{{ $enquiry->status }}">
                                                    <input type="hidden" name="from" value="leads">
                                                    <input type="hidden" name="enquiry_id" value="{{ $enquiry->id }}">
                                                    <button type="submit" class="btn btn-success btn-sm">Assign</button>
                                                </form>
                                            </td>
                                            <td>{{ $enquiry->name }}</td>
                                            <td style="word-break: break-word;">{{ $enquiry->email }}</td>
                                            <td>{{ $enquiry->phone }}</td>
                                            <td>{{ $enquiry->prefer_contact_type }}</td>
                                            <td>{{ $enquiry->country }}</td>
                                            <td style="word-break: break-word;">{{ $enquiry->url }}</td>
                                            <td class="text-center">
                                                <form method="POST" action="{{ route('enquiries.updateStatus', $enquiry->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="status" onchange="this.form.submit()" class="form-control form-control-sm">
                                                        <option value="1" {{ $enquiry->status == 1 ? 'selected' : '' }}>Pending</option>
                                                        <option value="0" {{ $enquiry->status == 0 ? 'selected' : '' }}>Inprocess</option>
                                                        <option value="2" {{ $enquiry->status == 2 ? 'selected' : '' }}>Completed</option>
                                                    </select>
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
