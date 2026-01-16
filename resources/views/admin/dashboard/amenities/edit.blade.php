@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header ">
            <a href="{{ route('admin.amenity.index') }}" class="text-lg">
                <i class="fas fa-arrow-left"></i></a>
            <h1 class="mx-3"> Update Amenity</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.amenity.update', $amenity->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="name" class="form-label ">Name*</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $amenity->name }}">
                                            @error('name')
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
                                            style="background-color: rgb(17, 17, 53);">Add Amenity</button>
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
