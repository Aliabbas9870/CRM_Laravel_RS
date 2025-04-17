@extends('backend.layout.main')
@section('title', 'Add Leads')
@section('content')

@if ($message = Session::get('success'))
    <script>
        window.onload = function() {
            alert('{{ $message }}');
            setTimeout(function() {
                alert.close();
            }, 3000);
        };
    </script>
@endif

<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Add Leads</h1>
            <small>Leads list</small>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-sm-12 p-1 mt-5">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonlist">
                            <a class="btn btn-add" href="/LeadList">
                                <i class="fa fa-list"></i> Leads List
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="col-sm-12" method="post" action="{{ url('/AddLeads') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" placeholder="Enter Name" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" placeholder="Enter Email" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="phone">Phone</label>
                                <input class="form-control" type="text" placeholder="Enter Phone" name="phone" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="country">Country</label>
                                <input class="form-control" type="text" placeholder="Enter Country" name="country" value="{{ old('country') }}">
                                @if ($errors->has('country'))
                                    <span class="text-danger">{{ $errors->first('country') }}</span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="prefer_contact_type">Preferred Contact Type</label>
                                <input class="form-control" type="text" placeholder="Enter Preferred Contact Type" name="prefer_contact_type" value="{{ old('prefer_contact_type') }}">
                                @if ($errors->has('prefer_contact_type'))
                                    <span class="text-danger">{{ $errors->first('prefer_contact_type') }}</span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="note">Note</label>
                                <textarea class="form-control" placeholder="Enter Note" name="note">{{ old('note') }}</textarea>
                                @if ($errors->has('note'))
                                    <span class="text-danger">{{ $errors->first('note') }}</span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="from">From</label>
                                <input class="form-control" type="text" placeholder="Enter Source" name="from" value="{{ old('from') }}">
                                @if ($errors->has('from'))
                                    <span class="text-danger">{{ $errors->first('from') }}</span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <label for="url">URL</label>
                                <input class="form-control" placeholder="Enter URL" name="url" value="{{ old('url') }}">
                                @if ($errors->has('url'))
                                    <span class="text-danger">{{ $errors->first('url') }}</span>
                                @endif
                            </div>

                            {{-- <div class="form-floating mb-3">
                                <label for="status">Status</label>
                                <input class="form-control" type="text" placeholder="Enter Status" name="status" value="{{ old('status', '1') }}">
                                @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                            </div> --}}
                            <h1></h1>
                            <div class="mt-7 mb-2 p-2">
                                <div class="d-grid">
                                    <input class="btn btn-success" type="submit" value="Add Lead" name="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
