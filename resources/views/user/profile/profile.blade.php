@extends('layouts.app')
@section('content')
    <x-frontend.banner title="Customer Edit Profile" />

    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('user.layouts.sidebar')
                <div class="col-lg-9 col-md-12">
                    <form action="{{ route('user.profile.handle') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Existing Photo</label>
                                <div class="form-group">
                                    @if (!Auth::guard('web')->user()->photo)
                                        Not found profile Image
                                    @else
                                        <img src="{{ asset(Auth::guard('web')->user()->photo) }}" alt=""
                                            width="250px" height="250px" class="rounded">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Change Photo</label>
                                <div class="form-group">
                                    <input type="file" class="form-control" id="photo" name="photo">
                                    @error('photo')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name">Name *</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ Auth::guard('web')->user()->name }}">
                                    @error('name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">Email *</label>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ Auth::guard('web')->user()->email }}">
                                    @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone">Phone *</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{ Auth::guard('web')->user()->phone }}">
                                    @error('phone')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="country">Country *</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="country" name="country"
                                        value="{{ Auth::guard('web')->user()->country }}">
                                    @error('country')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="address">Address *</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="{{ Auth::guard('web')->user()->address }}">
                                    @error('address')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="state">State *</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="state" name="state"
                                        value="{{ Auth::guard('web')->user()->state }}">
                                    @error('state')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="city">City *</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="city" name="city"
                                        value="{{ Auth::guard('web')->user()->city }}">
                                    @error('city')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="zip">Zip Code *</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="zip" name="zip"
                                        value="{{ Auth::guard('web')->user()->zip }}">
                                    @error('zip')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password">Password *</label>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="">
                                    @error('password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="confirm_password">confirm password *</label>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="confirm_password" value="">
                                    @error('confirm_password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
