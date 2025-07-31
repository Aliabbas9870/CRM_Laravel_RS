
<div class="container">
    <h2>Trigger Call</h2>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form action="{{ route('call.now') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Client Number</label>
            <input type="text" name="to" class="form-control" placeholder="+923001234567" required>
        </div>
        <button class="btn btn-primary">Call Now</button>
    </form>
</div>

