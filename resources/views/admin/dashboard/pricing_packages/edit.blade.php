@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header ">
            <a href="{{ route('admin.package.show') }}" class="text-lg ">
                <i class="fas fa-arrow-left"></i></a>
            <h1 class="mx-3"> Update Pricing Packages</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.package.update', $pricingPackage->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="name" class="form-label ">Name*</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $pricingPackage->name }}">
                                            @error('name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="price" class="form-label">Price*</label>
                                            <input type="number" class="form-control" id="price" name="price"
                                                value="{{ $pricingPackage->price }}">
                                            @error('price')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="allowed_days" class="form-label">Allowed days*</label>
                                            <input type="number" class="form-control" id="allowed_days" name="allowed_days"
                                                value="{{ $pricingPackage->allowed_days }}">
                                            @error('allowed_days')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="allowed_properties" class="form-label ">Allowed
                                                properties*</label>
                                            <input type="number" class="form-control" id="allowed_properties"
                                                name="allowed_properties" value="{{ $pricingPackage->allowed_properties }}">
                                            @error('allowed_properties')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <label for="allowed_features" class="form-label">Allowed features*</label>
                                            <input type="number" class="form-control" id="allowed_features"
                                                name="allowed_features" value="{{ $pricingPackage->allowed_features }}">
                                            @error('allowed_features')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <label for="allowed_photos" class="form-label ">Allowed photos*</label>
                                            <input type="number" class="form-control" id="allowed_photos"
                                                name="allowed_photos" value="{{ $pricingPackage->allowed_photos }}">
                                            @error('allowed_photos')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <label for="allowed_videos" class="form-label ">Allowed videos*</label>
                                            <input type="number" class="form-control" id="allowed_videos"
                                                name="allowed_videos" value="{{ $pricingPackage->allowed_videos }}">
                                            @error('allowed_videos')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-lg text-light"
                                            style="background-color: rgb(17, 17, 53);">Update Package</button>
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
