@extends('layouts.app')

@section('content')
    <x-frontend.banner title="Customer Registration" />

    <div class="page-content" style="height: 49vh !important">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-form">
                        <form action="{{ route('user.register.handle') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">UserName *</label>
                                <input type="text" name="name" class="form-control">
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email *</label>
                                <input type="text" name="email" class="form-control">
                                @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password *</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password *</label>
                                <input type="password" name="confirm_password" class="form-control">
                                @error('confirm_password')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">
                                    Create Account
                                </button>
                            </div>
                        </form>
                        <div class="mb-3">
                            <a href="{{ route('user.login.show') }}" class="primary-color">Existing User? Login Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
