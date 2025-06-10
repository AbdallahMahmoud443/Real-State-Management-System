@extends('layouts.app')
@section('content')
    <section>
        <x-frontend.banner title="Customer Login" />
        <div class="page-content" style="height: 46vh !important">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                        <div class="login-form">
                            <form action="{{ route('user.login.handle') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control">
                                    @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control">
                                    @error('password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary bg-website">
                                        Login
                                    </button>
                                    <a href="{{ route('user.forget-password.show') }}" class="primary-color">Forget
                                        Password?</a>
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('user.register.show') }}" class="primary-color">Don't have an account?
                                        Create Account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
