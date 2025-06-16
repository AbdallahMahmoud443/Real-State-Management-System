@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header ">
            <a href="{{ route('admin.location.index') }}" class="text-lg ">
                <i class="fas fa-arrow-left"></i></a>
            <h1 class="mx-3"> Create Location</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.location.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="name" class="form-label ">Name*</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="slug" class="form-label">slug*</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                value="{{ old('slug') }}">
                                            @error('slug')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="photo" class="form-label">Photo*</label>
                                            <input type="file" class="form-control" id="photo" name="photo"
                                                value="{{ old('photo') }}">
                                            @error('photo')
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
                                            style="background-color: rgb(17, 17, 53);">Add Location</button>
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
