@extends('layouts.app')

@section('content')
    <x-frontend.banner title="Customer Forget Password" />
    <div class="page-content" style="height: 46vh !important">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-form">
                        <form action="{{ route('user.forget-password.handle') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="text" name="email" class="form-control">
                                @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary bg-website">
                                    Send Email Verification
                                </button>
                                <a href="{{ route('user.login.show') }}" class="primary-color text-decoration-none">Back
                                    to
                                    LogIn</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
