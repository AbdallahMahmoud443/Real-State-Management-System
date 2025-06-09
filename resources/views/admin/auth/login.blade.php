@extends('admin.layouts.auth_layout')
@section('content')
    <div class="card card-primary border-box">
        <div class="card-header card-header-auth">
            <h4 class="text-center">Admin Panel Login</h4>
        </div>
        <div class="card-body card-body-auth">
            <form action="{{ route('admin.login.handle') }}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email Address" value=""
                        autofocus>
                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg w_100_p">
                        Login
                    </button>
                </div>
                <div class="form-group">
                    <div>
                        <a href="{{ route('admin.forget-password.show') }}" class="">Forget Password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
