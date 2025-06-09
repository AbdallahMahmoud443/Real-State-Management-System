@extends('user.layouts.app')
@section('content')
    <section class="d-flex justify-content-center">
        <div class="card shadow-lg w-100" style="max-width: 880px;">
            <div class="card-body">
                <div class="text-center">
                    <h2>Welcome {{ Auth::guard('web')->user()->name }} to Profile page</h2>
                    <p class="card-text text-muted">Change Settings of your Account </p>
                </div>
                <div class="mt-4">
                    <form action="{{ route('user.profile.handle') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-4">
                                    <label for="name" class="form-label text-muted">name</label>
                                    <input type="name" class="form-control" id="name" name="name"
                                        value="{{ Auth::guard('web')->user()->name }}">
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
                                        value="{{ Auth::guard('web')->user()->email }}">
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
                                    <label for="phone" class="form-label text-muted">phone</label>
                                    <input type="phone" class="form-control" id="phone" name="phone"
                                        value="{{ Auth::guard('web')->user()->phone }}">
                                    @error('phone')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-4">
                                    <label for="address" class="form-label text-muted">address</label>
                                    <input type="address" class="form-control" id="address" name="address"
                                        value="{{ Auth::guard('web')->user()->address }}">
                                    @error('address')
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
                                    <label for="country" class="form-label text-muted">country</label>
                                    <input type="country" class="form-control" id="country" name="country"
                                        value="{{ Auth::guard('web')->user()->country }}">
                                    @error('country')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-4">
                                    <label for="state" class="form-label text-muted">state</label>
                                    <input type="state" class="form-control" id="state" name="state"
                                        value="{{ Auth::guard('web')->user()->state }}">
                                    @error('state')
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
                                    <label for="city" class="form-label text-muted">city</label>
                                    <input type="city" class="form-control" id="city" name="city"
                                        value="{{ Auth::guard('web')->user()->city }}">
                                    @error('city')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-4">
                                    <label for="zip" class="form-label text-muted">zip</label>
                                    <input type="text" class="form-control" id="zip" name="zip"
                                        value="{{ Auth::guard('web')->user()->zip }}">
                                    @error('zip')
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
                                        @if (!Auth::guard('web')->user()->photo)
                                            Not found profile Image
                                        @else
                                            <img src="{{ asset(Auth::guard('web')->user()->photo) }}" alt=""
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
