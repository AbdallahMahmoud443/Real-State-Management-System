@extends('admin.layouts.auth_layout')
@section('content')
    <div class="card card-primary border-box">
        <div class="card-header card-header-auth">
            <h4 class="text-center">Reset Password</h4>
        </div>
        <div class="card-body card-body-auth">
            <form action="{{ route('admin.forget-password.handle') }}" method="POST">
                @csrf
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
                    <button type="submit" class="btn btn-primary btn-lg w_100_p">
                        Send Password Reset Link
                    </button>
                </div>
                <div class="form-group">
                    <div>
                        <a href="{{ route('admin.login.show') }}" class="link-primary text-decoration-none">Back to
                            LogIn</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
