@extends('user.layouts.auth_layout')

@section('content')
    <div class="card shadow-lg w-100" style="max-width: 480px;">
        <div class="card-body">
            <div class="text-center">
                <h1 class="card-title h3 login-header"> Sign in as Admin</h1>
                <p class="card-text text-muted">Sign in below to access your Admin account</p>
            </div>

            <div class="mt-4">
                <form action="{{ route('admin.login.handle') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-4">
                        <label for="email" class="form-label text-muted">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email Address"
                            name="email">
                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-4">
                            <label for="password" class="form-label text-muted">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password"
                                name="password">
                            @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                        </div>
                        <div class="mt-2 w-100 d-flex">
                            <a href="{{ route('admin.forget-password.show') }}" class="">Forget Password?</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
