@extends('layouts.app')

@section('content')
    <section>
        <x-frontend.banner title="Property Details" />
        <div class="property-result pt_50 pb_50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="left-item">
                            <div class="main-photo">
                                <img src="{{ asset($property->cover) }}" alt="">
                            </div>
                            <h2>
                                Description
                            </h2>
                            <p>
                                {!! $property->description !!}
                            </p>
                        </div>
                        <div class="left-item">
                            <h2>
                                Photos
                            </h2>
                            <div class="photo-all">
                                <div class="row">
                                    @if (count($property->images) > 0)
                                        @foreach ($property->images as $image)
                                            <div class="col-md-6 col-lg-4">
                                                <div class="item">
                                                    <a href="{{ asset($image->image) }}" class="magnific">
                                                        <img src="{{ asset($image->image) }}" alt="" />
                                                        <div class="icon">
                                                            <i class="fas fa-plus"></i>
                                                        </div>
                                                        <div class="bg"></div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <span class="text-danger">No Images</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="left-item">
                            <h2>
                                Videos
                            </h2>
                            <div class="video-all">
                                <div class="row">
                                    @if (count($property->videos) > 0)
                                        @foreach ($property->videos as $video)
                                            <div class="col-md-6 col-lg-4">
                                                <div class="item">
                                                    <a class="video-button" href="{{ $video->video }}">
                                                        <img src="http://img.youtube.com/vi/{{ $video->video }}/0.jpg"
                                                            alt="" />
                                                        <div class="icon">
                                                            <i class="far fa-play-circle"></i>
                                                        </div>
                                                        <div class="bg"></div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <span class="text-danger">No Videos</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="left-item mb_50">
                            <h2>Share</h2>
                            <div class="share">
                                <a class="facebook"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}&picture={{ urlencode(asset($property->cover)) }}"
                                    target="_blank">
                                    Facebook
                                </a>
                                <a class="twitter"
                                    href="https://twitter.com/share?url={{ urlencode(url()->current()) }}&text={{ urlencode($property->name) }}"
                                    target="_blank">
                                    Twitter
                                </a>
                                <a class="linkedin"
                                    href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($property->name) }}&summary={{ urlencode($property->description) }}"
                                    target="_blank">
                                    LinkedIn
                                </a>
                            </div>
                        </div>
                        <div class="left-item">
                            <h2>
                                Related Properties
                            </h2>
                            <div class="property related-property pt_0 pb_0">
                                <div class="row">
                                    @if (count($relatedProperties) > 0)
                                        @foreach ($relatedProperties as $relatedProperty)
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="item">
                                                    <div class="photo">
                                                        <img class="main" src="{{ asset($relatedProperty->cover) }}"
                                                            alt="">
                                                        <div class="top">
                                                            <div class="status-sale">
                                                                {{ $relatedProperty->status }}
                                                            </div>
                                                            <div class="featured">
                                                                {{ $relatedProperty->is_featured == 1 ? 'Featured' : 'No Featured' }}
                                                            </div>
                                                        </div>
                                                        <div class="price">${{ $relatedProperty->price }}</div>
                                                        <div class="wishlist"><a href=""><i
                                                                    class="far fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <h3><a
                                                                href="{{ route('property.details', $relatedProperty->slug) }}">{{ $relatedProperty->title }}</a>
                                                        </h3>
                                                        <div class="detail">
                                                            <div class="stat">
                                                                <div class="i1">{{ $relatedProperty->size }} sqft</div>
                                                                <div class="i2">{{ $relatedProperty->bedrooms }} Bed
                                                                </div>
                                                                <div class="i3">{{ $relatedProperty->bathrooms }} Bath
                                                                </div>
                                                            </div>
                                                            <div class="address">
                                                                <i class="fas fa-map-marker-alt"></i>
                                                                {{ $relatedProperty->address }}
                                                            </div>
                                                            <div class="type-location">
                                                                <div class="i1">
                                                                    <i class="fas fa-edit"></i>
                                                                    {{ $relatedProperty->types->name }}
                                                                </div>
                                                                <div class="i2">
                                                                    <i class="fas fa-location-arrow"></i>
                                                                    {{ $relatedProperty->location->name }}
                                                                </div>
                                                            </div>
                                                            <div class="agent-section">
                                                                <img class="agent-photo"
                                                                    src="{{ asset($relatedProperty->agent->photo) }}"
                                                                    alt="">
                                                                <a href="">{{ $relatedProperty->agent->name ?? 'Not Provided' }}
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
                                        <span class="text-danger">No Related Properties</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="right-item">
                            <h2>Agent</h2>
                            <div class="agent-right d-flex justify-content-start">
                                <div class="left">
                                    <img src="{{ asset($property->agent->photo) }}" alt="">
                                </div>
                                <div class="right">
                                    <h3><a href="">{{ $property->agent->name ?? 'Not Provided' }}</a></h3>
                                    <h4>{{ $property->agent->company ?? 'Not Provided' }}</h4>
                                </div>
                            </div>
                            <div class="table-responsive mt_25">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Posted On: </td>
                                        <td>{{ $property->created_at->format('d M, Y') ?? 'Not Provided' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email: </td>
                                        <td>{{ $property->agent->email ?? 'Not Provided' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone: </td>
                                        <td>{{ $property->agent->phone ?? 'Not Provided' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="right-item">
                            <h2>Features</h2>
                            <div class="summary">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><b>Price</b></td>
                                            <td>${{ number_format($property->price) ?? 'Not Provided' }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Location</b></td>
                                            <td>{{ $property->location->name ?? 'Not Provided' }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Type</b></td>
                                            <td>{{ $property->types->name ?? 'Not Provided' }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Status</b></td>
                                            <td>For {{ $property->status ?? 'Not Provided' }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Bedroom:</b></td>
                                            <td>{{ $property->bedrooms ?? 'Not Provided' }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Bathroom:</b></td>
                                            <td>{{ $property->bathrooms ?? 'Not Provided' }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Size:</b></td>
                                            <td>{{ $property->size ?? 'Not Provided' }} sqft</td>
                                        </tr>
                                        <tr>
                                            <td><b>Floor:</b></td>
                                            <td>{{ $property->floor ?? 'Not Provided' }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Garage:</b></td>
                                            <td>{{ $property->garage ?? 'Not Provided' }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Balcony:</b></td>
                                            <td>{{ $property->balcony ?? 'Not Provided' }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Address:</b></td>
                                            <td>{{ $property->address ?? 'Not Provided' }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Built Year:</b></td>
                                            <td>{{ $property->built_year ?? 'Not Provided' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="right-item">
                            <h2>Amenities</h2>
                            @if (count($property->amenities) > 0)
                                <div class="amenity">
                                    <ul class="amenity-ul">
                                        @foreach ($property->amenities as $amenity)
                                            <li><i class="fas fa-check-square"></i> {{ $amenity->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                                <span class="text-danger">No Amenities</span>
                            @endif

                        </div>
                        <div class="right-item">
                            <h2>Location Map</h2>
                            <div class="location-map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3629.2542091435403!2d-97.90512175238419!3d38.06450160184029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1671347381733!5m2!1sen!2sbd"
                                    width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="right-item">
                            <h2>Enquiry Form</h2>
                            <div class="enquery-form">
                                <form action="{{ route('enquery.form.handle', $property->slug) }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name='name'
                                            placeholder="Full Name" />
                                        @error('name')
                                            <span class="text-danger"">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="Email Address"
                                            name='email' />
                                        @error('email')
                                            <span class="text-danger"">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Phone Number"
                                            name='phone' />
                                        @error('phone')
                                            <span class="text-danger"">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control h-150" rows="3" placeholder="Message" name="message"></textarea>
                                        @error('message')
                                            <span class="text-danger"">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
