<!DOCTYPE html>
<html>
<head>
    <title>Laravel Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">

<div class="container">
    <div class="col-md-6 mx-auto">
        <div class="card p-4">
            <h3 class="text-center">Login</h3>

            {{-- Session Messages --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Validation Errors --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Login</button>

                <p class="text-muted text-center mt-3">
                    <small>Do not have an account?</small>
                </p>
                <a class="btn btn-sm btn-secondary btn-block" href="{{ route('Register') }}">Create an account</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
