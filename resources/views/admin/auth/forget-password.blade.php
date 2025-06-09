@extends('admin.layouts.auth_layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="card border border-light-subtle rounded-3 shadow-sm">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="text-center mb-3">
                            <strong>
                                <span style="font-size: 1.5rem">
                                    <span style="color: rgb(10, 10, 32)">MultiAuth System</span>
                                </span>
                            </strong>
                        </div>
                        <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Provide the email address
                            associated with your Admin account to recover your password.</h2>
                        <form action="{{ route('admin.forget-password.handle') }}" method="POST">
                            @csrf
                            <div class="row gy-2 overflow-hidden">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="name@example.com">
                                        <label for="email" class="form-label">Email</label>
                                    </div>
                                    @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="d-grid my-3">
                                        <button class="btn btn-primary btn-lg" type="submit">Send
                                            Email</button>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="d-flex gap-2 justify-content-between">
                                        <a href="{{ route('admin.login.show') }}"
                                            class="link-primary text-decoration-none">Back to LogIn</a>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
