@extends('layouts.app')

@section('content')
    <section>
        <x-frontend.banner title="Locations" />
        <div class="location pb_40">
            <div class="container">
                <div class="row">
                    @foreach ($locations as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="item">
                                <div class="photo">
                                    <a href="{{ route('location.properties', $item->slug) }}"><img
                                            src="{{ asset($item->photo) }}" alt=""></a>
                                </div>
                                <div class="text">
                                    <h2><a href="{{ route('location.properties', $item->slug) }}">{{ $item->name }}</a>
                                    </h2>
                                    <h4>({{ $item->properties_count }} Properties)</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>
@endsection
