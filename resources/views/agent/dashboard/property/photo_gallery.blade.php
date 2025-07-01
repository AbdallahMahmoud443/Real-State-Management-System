@extends('layouts.app')
@section('content')
    <x-frontend.banner title="Photo Gallery" />
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('agent.layouts.sidebar')
                <div class="col-lg-9 col-md-12">
                    <h4>Add Photo</h4>
                    <form action="{{ route('agent.properties.photos.upload', $property->slug) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input type="file" name="photos[]" class="form-control" multiple />
                                </div>
                                @error('photos.*')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-sm" value="Submit" />
                            </div>
                        </div>
                    </form>

                    <h4 class="mt-4">Existing Photos</h4>
                    <div class="photo-all">
                        <div class="row">
                            @foreach ($property->images as $image)
                                <div class="col-md-6 col-lg-3">
                                    <div class="item item-delete">
                                        <a href="{{ asset($image->image) }}" class="magnific">
                                            <img src="{{ asset($image->image) }}" alt="" />
                                            <div class="icon">
                                                <i class="fas fa-plus"></i>
                                            </div>
                                            <div class="bg"></div>
                                        </a>
                                    </div>
                                    <a href="{{ route('agent.properties.photos.delete', $image->id) }}"
                                        class="badge bg-danger mb_20" onClick="return confirm('Are you sure?');">Delete</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
