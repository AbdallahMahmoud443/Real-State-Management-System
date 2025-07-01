@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Property Details</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $property->title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Property Information</h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Price</th>
                                            <td>${{ number_format($property->price) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <td>{{ $property->type->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Bedrooms</th>
                                            <td>{{ $property->bedrooms }}</td>
                                        </tr>
                                        <tr>
                                            <th>Bathrooms</th>
                                            <td>{{ $property->bathrooms }}</td>
                                        </tr>
                                        <tr>
                                            <th>Size</th>
                                            <td>{{ $property->size }} sq ft</td>
                                        </tr>
                                        <tr>
                                            <th>Floor</th>
                                            <td>{{ $property->floor }}</td>
                                        </tr>
                                        <tr>
                                            <th>Garage</th>
                                            <td>{{ $property->garage ? 'Yes' : 'No' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{ $property->address }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <h5>Agent Information</h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $property->agent->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $property->agent->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td>{{ $property->agent->phone ?? 'no' }}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <h5>Description</h5>
                                    <p>{!! $property->description !!}</p>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <h5>Location</h5>
                                    <p>{{ $property->location->name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Amenities</h5>
                                    <ul>
                                        @foreach ($property->amenities as $amenity)
                                            <li>{{ $amenity->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <h5>Images</h5>
                                    <div class="row">
                                        @foreach ($property->images as $image)
                                            <div class="col-md-3">
                                                <img src="{{ asset($image->image) }}" class="img-fluid"
                                                    alt="Property Image">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12 ">
                                    <h5>Video</h5>
                                    @if ($property->videos)
                                        <div class="d-flex">
                                            @foreach ($property->videos as $video)
                                                <div class="embed-responsive embed-responsive-16by9 mx-1">
                                                    <iframe class="embed-responsive-item"
                                                        src="https://www.youtube.com/embed/{{ $video->video }}"
                                                        allowfullscreen></iframe>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p>No video available.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
