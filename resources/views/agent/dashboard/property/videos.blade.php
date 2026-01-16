@extends('layouts.app')
@section('content')
    <x-frontend.banner title="Videos" />
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('agent.layouts.sidebar')
                <div class="col-lg-9 col-md-12">
                    <h4>Add Video Code</h4>
                    <form action="{{ route('agent.properties.videos.store', $property->slug) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input type="text" name="video" class="form-control" placeholder="Video Code" />
                                </div>
                                @error('video')
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

                    <h4 class="mt-4">Existing Videos</h4>
                    <div class="video-all">
                        <div class="row">
                            @foreach ($property->videos as $video)
                                <div class="col-md-6 col-lg-3">
                                    <div class="item item-delete">
                                        <a class="video-button" href="http://www.youtube.com/watch?v={{ $video->video }}">
                                            <img src="http://img.youtube.com/vi/{{ $video->video }}/0.jpg" alt="" />
                                            <div class="icon">
                                                <i class="far fa-play-circle"></i>
                                            </div>
                                            <div class="bg"></div>
                                        </a>
                                    </div>
                                    <a href="{{ route('agent.properties.videos.delete', $video->id) }}"
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
