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

{{--  <a href="{{ route('admin.leadList', ['sort' => 'asc']) }}"
   class="btn btn-sm {{ $currentSort == 'asc' ? 'btn-success' : 'btn-primary' }}">
   Sort Ascending
</a>  --}}



                        {{-- ✅ Sorting Buttons (Correct Position) --}}
                        <div class="mb-3 d-flex justify-content-end">
                            <a href="{{ route('admin.leadList', ['sort' => 'asc']) }}" class="btn btn-primary btn-sm me-2"> Ascending</a>
                            <a href="{{ route('admin.leadList', ['sort' => 'desc']) }}"
                                class="btn btn-sm {{ $currentSort == 'desc' ? 'btn-success' : 'btn-secondary' }}">
                                Descending
                             </a>
                        </div>

                        <div class="table-responsive">
                            <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="info">
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Prefer Contact</th>
                                        <th>Country</th>
                                        <th>Url</th>
                                        <th>Notes</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enquiry as $enquiry)
                                    <tr>
                                        <td>{{ $enquiry->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $enquiry->name }}</td>
                                        <td>{{ $enquiry->email }}</td>
                                        <td>{{ $enquiry->phone }}</td>
                                        <td>{{ $enquiry->prefer_contact_type }}</td>
                                        <td>{{ $enquiry->country }}</td>
                                        <td>{{ $enquiry->url }}</td>
                                        <td>{{ $enquiry->note }}</td>
                                        <td class="text-center">
                                            @if($enquiry->status == 1)
                                            <span class="badge badge-success custom-badge">Active</span>
                                            @else
                                            <span class="badge badge-danger custom-badge">Disabled</span>
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

@endsection
