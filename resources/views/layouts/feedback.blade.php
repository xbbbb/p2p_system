@if (session('success'))
    <div class="container-fluid">
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    </div>

@endif
@if (session('fail'))
    <div class="container-fluid">
        <div class="alert alert-danger text-center">
            {{ session('fail') }}
        </div>
    </div>
@endif