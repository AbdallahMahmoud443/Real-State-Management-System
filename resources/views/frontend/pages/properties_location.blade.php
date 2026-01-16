@extends('layouts.app')

@section('content')
    <section>
        <x-frontend.banner title="Location: {{ $location->name }}" />
        <div class="property">
            <div class="container">
                <div class="row">
                    @if (count($properties) != 0)
                        @foreach ($properties as $property)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="item">
                                    <div class="photo">
                                        <img class="main" src="{{ asset($property->cover) }}" alt="">
                                        <div class="top">
                                            <div class="status-sale">
                                                {{ $property->status }}
                                            </div>
                                            <div class="featured">
                                                @if ($property->is_featured == 1)
                                                    Featured
                                                @else
                                                    No Featured
                                                @endif
                                            </div>
                                        </div>
                                        <div class="price">${{ $property->price }}</div>
                                        <div class="wishlist"><a href=""><i class="far fa-heart"></i></a></div>
                                    </div>
                                    <div class="text">
                                        <h3><a
                                                href="{{ route('property.details', $property->slug) }}">{{ $property->title }}</a>
                                        </h3>
                                        <div class="detail">
                                            <div class="stat">
                                                <div class="i1">{{ $property->size }} sqft</div>
                                                <div class="i2">{{ $property->bedrooms }} Bed</div>
                                                <div class="i3">{{ $property->bathrooms }} Bath</div>
                                            </div>
                                            <div class="address">
                                                <i class="fas fa-map-marker-alt"></i> {{ $property->address }}
                                            </div>
                                            <div class="type-location">
                                                <div class="i1">
                                                    <i class="fas fa-edit"></i> {{ $property->types->name }}
                                                </div>
                                                <div class="i2">
                                                    <i class="fas fa-location-arrow"></i> {{ $property->location->name }}
                                                </div>
                                            </div>
                                            <div class="agent-section">
                                                <img class="agent-photo" src="{{ asset($property->agent->photo) }}"
                                                    alt="">
                                                <a href="">{{ $property->agent->name }}
                                                    ({{ $property->agent->company }})
                                                    Company</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12">
                            {{ $properties->links() }}
                        </div>
                    @else
                        <span class="text-center text-danger">No Properties Found</span>
                    @endif
                </div>
            </div>
        </div>

    </section>
@endsection
