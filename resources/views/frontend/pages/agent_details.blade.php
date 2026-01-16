@extends('layouts.app')

@section('content')
    <section>
        <x-frontend.banner title="Agent:{{ $agent->name }}" />
        <div class="agent-detail">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inner">
                            <div class="photo">
                                <img src="{{ asset($agent->photo) }}" alt="">
                            </div>
                            <div class="detail">
                                <h3>{{ $agent->name }} (AA Property)</h3>
                                <h4>{{ $agent->company ?? 'No Company Provided' }}</h4>
                                <div>
                                    {!! $agent->biography !!}
                                </div>
                                <div class="contact d-flex justify-content-center">
                                    <div class="item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $agent->address ?? 'Address Not Provided' }}
                                    </div>
                                    <div class="item">
                                        <i class="fas fa-phone"></i> {{ $agent->phone ?? 'Address Not Provided' }}
                                    </div>
                                    <div class="item">
                                        <i class="far fa-envelope">
                                        </i> {{ $agent->email }}
                                    </div>
                                    <div class="item">
                                        <i class="fas fa-globe">
                                        </i>{{ $agent->website ?? 'Address Not Provided' }}
                                    </div>
                                </div>
                                <ul class="agent-detail-ul">
                                    <li><a href="{{ $agent->facebook ?? '#' }}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $agent->twitter ?? '#' }}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ $agent->pinterest ?? '#' }}"><i class="fab fa-pinterest-p"></i></a>
                                    </li>
                                    <li><a href="{{ $agent->instagram ?? '#' }}"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{ $agent->linkedin ?? '#' }}"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="{{ $agent->youtube ?? '#' }}"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="property">
            <div class="container">
                <div class="row">
                    @if (count($properties) > 0)
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
                                                {{ $property->is_featured == 1 ? 'Featured' : '' }}
                                            </div>
                                        </div>
                                        <div class="price">{{ $property->price }}</div>
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
                                                <a href="{{ route('agents.details', $property->agent->id) }}">{{ $property->agent->name }}
                                                    (AA
                                                    Property)
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <span class="text-danger">No Properties Found</span>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
