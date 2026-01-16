@extends('layouts.app')
@section('content')
    <x-frontend.banner title="Agent Edit Profile" />

    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('agent.layouts.sidebar')
                <div class="col-lg-9 col-md-12">
                    <form action="{{ route('agent.profile.handle') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Existing Photo</label>
                                <div class="form-group">
                                    @if (!Auth::guard('agent')->user()->photo)
                                        Not found profile Image
                                    @else
                                        <img src="{{ asset(Auth::guard('agent')->user()->photo) }}" alt=""
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
                            <div class="col-md-4 mb-3">
                                <label for="name">Name *</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ Auth::guard('agent')->user()->name }}">
                                    @error('name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="company">company *</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="company" name="company"
                                        value="{{ Auth::guard('agent')->user()->company }}">
                                    @error('company')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="designation ">Designation*</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="designation" name="designation"
                                        value="{{ Auth::guard('agent')->user()->designation }}">
                                    @error('designation')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Biography</label>
                                <textarea name="biography" class="form-control editor" cols="30" rows="10">I am working as property agent for 10 years. I have sold about 200+ properties and all my clients are international clients.</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone">Email *</label>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ Auth::guard('agent')->user()->email }}">
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
                                        value="{{ Auth::guard('agent')->user()->phone }}">
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
                                        value="{{ Auth::guard('agent')->user()->country }}">
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
                                        value="{{ Auth::guard('agent')->user()->address }}">
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
                                        value="{{ Auth::guard('agent')->user()->state }}">
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
                                        value="{{ Auth::guard('agent')->user()->city }}">
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
                                        value="{{ Auth::guard('agent')->user()->zip }}">
                                    @error('zip')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="website">website*</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="website" name="website"
                                        value="{{ Auth::guard('agent')->user()->website }}">
                                    @error('website')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="facebook">facebook*</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="facebook" name="facebook"
                                        value="{{ Auth::guard('agent')->user()->facebook }}">
                                    @error('facebook')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="twitter">twitter*</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="twitter" name="twitter"
                                        value="{{ Auth::guard('agent')->user()->twitter }}">
                                    @error('twitter')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="linkedin">linkedin*</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="linkedin" name="linkedin"
                                        value="{{ Auth::guard('agent')->user()->linkedin }}">
                                    @error('linkedin')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="pinterest">pinterest*</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="pinterest" name="pinterest"
                                        value="{{ Auth::guard('agent')->user()->pinterest }}">
                                    @error('pinterest')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="instagram">instagram*</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="instagram" name="instagram"
                                        value="{{ Auth::guard('agent')->user()->instagram }}">
                                    @error('instagram')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="youtube">youtube*</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="youtube" name="youtube"
                                        value="{{ Auth::guard('agent')->user()->youtube }}">
                                    @error('youtube')
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
