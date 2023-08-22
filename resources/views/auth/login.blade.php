@extends('app')

@section('content')
<!-- row with centering -->
@auth
<div class="row">
    <div class="col-md-12 d-flex justify-content-center align-items-center vh-100">
        <h1 class="text-center">You are logged in! {{ Auth::user()->name }}</h1>
    </div>
</div>
@else
<div class="row justify-content-center align-items-center vh-100">
    <div class="col-md-6">
        <div class="card p-4">
            <h1 class="card-title text-center mb-4">Login</h1>
            <form action="{{ route('web.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">Log in</button>
                    <a href="#" class="text-primary">Forgot password?</a>
                </div>
            </form>
        </div>
    </div>

    @endauth
    @endsection
