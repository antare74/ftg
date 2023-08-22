@extends('app')

@section('content')
<!-- row with centering -->
<div class="row justify-content-center align-items-center vh-100">
    <div class="col-md-6">
        <div class="card p-4">
            <h1 class="card-title text-center mb-4">Register</h1>
            <form action="{{ route('web.register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" id="name" name="name" class="form-control" value="{{ old('name') }}" autofocus>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" autofocus>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <a href="#" class="text-primary">Forgot password?</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
