<div class="container-fluid my-1">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show text-light">
            <button type="button" class="btn-close text-light" data-bs-dismiss="alert"></button>
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show text-light">
            <button type="button" class="btn-close text-light" data-bs-dismiss="alert"></button>
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

</div>
