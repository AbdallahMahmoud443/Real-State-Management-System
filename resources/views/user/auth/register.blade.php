@extends('user.layouts.auth_layout')
@section('content')
    <div class="card shadow-lg w-100" style="max-width: 480px;">
        <div class="card-body">
            <div class="text-center">
                <h1 class="card-title h3 login-header"> Sign in as User</h1>
                <p class="card-text text-muted">Sign in below to access your User account</p>
            </div>
            <div class="mt-4">
                <form action="{{ route('user.register.handle') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-4">
                        <label for="name" class="form-label text-muted">UserName</label>
                        <input type="text" class="form-control" id="name" placeholder="name" name="name">
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label text-muted">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email Address"
                            name="email">
                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label text-muted">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-lg text-light" style="background-color: rgb(17, 17, 53);">Sign
                            up</button>
                    </div>
                    <p class="text-center text-muted mt-4">Do have an account yet?
                        <a href="{{ route('user.login.show') }}" class="text-decoration-none">Sign in</a>.
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
