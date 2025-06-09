@extends('admin.layouts.app')
@section('content')
    <section class="d-flex justify-content-center">
        <div class="card shadow-lg w-100" style="max-width: 880px;">
            <div class="card-body">
                <div class="text-center">
                    <h2>Welcome {{ Auth::guard('admin')->user()->name }} to Profile page</h2>
                    <p class="card-text text-muted">Change Settings of your Account </p>
                </div>
                <div class="mt-4">
                    <form action="{{ route('admin.profile.handle') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-4">
                                    <label for="name" class="form-label text-muted">name</label>
                                    <input type="name" class="form-control" id="name" name="name"
                                        value="{{ Auth::guard('admin')->user()->name }}">
                                    @error('name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-4">
                                    <label for="email" class="form-label text-muted">email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ Auth::guard('admin')->user()->email }}">
                                    @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-4">
                                    <label for="password" class="form-label text-muted">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    @error('password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-4">
                                    <label for="confirm_password" class="form-label text-muted">confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="confirm_password">
                                    @error('confirm_password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <label for="photo" class="form-label text-muted">photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                    <div class="my-2">
                                        @if (!Auth::guard('admin')->user()->photo)
                                            Not found profile Image
                                        @else
                                            <img src="{{ asset(Auth::guard('admin')->user()->photo) }}" alt=""
                                                width="100px" height="100px">
                                        @endif
                                    </div>
                                    @error('photo')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button type="submit" class="btn btn-lg text-light"
                                style="background-color: rgb(17, 17, 53);">Update Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
