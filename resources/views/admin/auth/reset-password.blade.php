@extends('admin.layouts.auth_layout')
@section('content')
    <div class="card card-primary border-box">
        <div class="card-header card-header-auth">
            <h4 class="text-center">Reset Password</h4>
        </div>
        <div class="card-body card-body-auth">
            <form action="{{ route('admin.reset-password.handle', [$email, $token]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" value=""
                        autofocus>
                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="confirm_password" placeholder="Retype Password"
                        value="">
                    @error('confirm_password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg w_100_p">
                        Submit
                    </button>
                </div>
                <div class="form-group">
                    <div class="d-flex gap-2 justify-content-between">
                        <a href="{{ route('admin.login.show') }}" class="link-primary text-decoration-none">Back to
                            LogIn</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
