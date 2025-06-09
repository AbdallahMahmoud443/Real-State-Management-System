@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Profile</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.profile.handle') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        @if (!Auth::guard('admin')->user()->photo)
                                            Not found profile Image
                                        @else
                                            <img src="{{ asset(Auth::guard('admin')->user()->photo) }}" alt=""
                                                class="profile-photo w_100_p">
                                        @endif
                                        <input type="file" class="mt_10" name="photo">
                                        @error('photo')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-9">
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
                                        <div class="mb-4">
                                            <label for="password" class="form-label text-muted">Password</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                            @error('password')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="confirm_password" class="form-label text-muted">confirm
                                                Password</label>
                                            <input type="password" class="form-control" id="confirm_password"
                                                name="confirm_password">
                                            @error('confirm_password')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <div class="d-flex">
                                                <button type="submit" class="btn btn-lg text-light"
                                                    style="background-color: rgb(17, 17, 53);">Update Settings</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
