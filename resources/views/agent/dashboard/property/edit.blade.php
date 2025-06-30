@extends('layouts.app')
@section('content')
    <x-frontend.banner title="Edit Property" />
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('agent.layouts.sidebar')
                <div class="col-lg-9 col-md-12">
                    <form action="{{ route('agent.properties.update', $property->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="title" class="form-label">Title *</label>
                                <input type="text" name="title" class="form-control" value="{{ $property->title }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="slug" class="form-label">Slug *</label>
                                <input type="text" name="slug" class="form-control" value="{{ $property->slug }}">
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="price" class="form-label">Price *</label>
                                <input type="number" name="price" class="form-control" value="{{ $property->price }}">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control editor" cols="30" rows="10">{!! $property->description !!}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="cover" class="form-label">Cover</label>
                                <input type="file" name="cover" class="form-control" id="cover">
                                <img src="{{ asset($property->cover) }}" width="150" height="150" class="my-3 rounded">
                                @error('cover')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="location" class="form-label">Location *</label>
                                <select name="location_id" class="form-control select2">
                                    <option value="">--- Select ---</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}"
                                            {{ $property->location_id == $location->id ? 'selected' : '' }}>
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('location_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="type" class="form-label">Type *</label>
                                <select name="type_id" class="form-control select2">
                                    <option value="">--- Select ---</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                            {{ $property->type_id == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="status" class="form-label">Status *</label>
                                <select name="status" class="form-control select2">
                                    <option value="">--- Select ---</option>
                                    <option value="sale" {{ $property->status == 'sale' ? 'selected' : '' }}>For Sale
                                    </option>
                                    <option value="rent" {{ $property->status == 'rent' ? 'selected' : '' }}>For Rent
                                    </option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="is_featured" class="form-label">Is Featured *</label>
                                <select name="is_featured" class="form-control select2">
                                    <option value="">--- Select ---</option>
                                    <option value="1" {{ $property->is_featured == '1' ? 'selected' : '' }}>yes
                                    </option>
                                    <option value="0" {{ $property->is_featured == '0' ? 'selected' : '' }}>no
                                    </option>
                                </select>
                                @error('is_featured')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="bedrooms" class="form-label">Bedrooms *</label>
                                <select name="bedrooms" class="form-control select2">
                                    <option value="">--- Select ---</option>
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}"
                                            {{ $property->bedrooms == $i ? 'selected' : '' }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                @error('bedrooms')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="bathrooms" class="form-label">Bathrooms *</label>
                                <select name="bathrooms" class="form-control select2">
                                    <option value="">--- Select ---</option>
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}"
                                            {{ $property->bathrooms == $i ? 'selected' : '' }}>{{ $i }}
                                        </option>
                                    @endfor
                                </select>
                                @error('bathrooms')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="size" class="form-label">Size (Sqft) *</label>
                                <input type="number" name="size" class="form-control"
                                    value="{{ $property->size }}">
                                @error('size')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="floor" class="form-label">Floor</label>
                                <input type="number" name="floor" class="form-control"
                                    value="{{ $property->floor }}">
                                @error('floor')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="garage" class="form-label">Garage</label>
                                <input type="number" name="garage" class="form-control"
                                    value="{{ $property->garage }}">
                                @error('garage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="balcony" class="form-label">Balcony</label>
                                <input type="number" name="balcony" class="form-control"
                                    value="{{ $property->balcony }}">
                                @error('balcony')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-8 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ $property->address }}">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="built_year" class="form-label">Built Year</label>
                                <input type="date" name="built_year" class="form-control"
                                    value="{{ $property->built_year }}">
                                @error('built_year')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="location_map" class="form-label">Location Map Url</label>
                                <input type="text" name="location_map" class="form-control"
                                    value="{{ $property->location_map }}">
                                @error('location_map')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="amenities" class="form-label">Amenities</label>
                                <div class="row">
                                    @foreach ($amenities as $amenity)
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="amenities[]"
                                                    value="{{ $amenity->id }}" id="chk2-{{ $amenity->id }}"
                                                    {{ in_array($amenity->id, $property_amenities) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="chk2-{{ $amenity->id }}">
                                                    {{ $amenity->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @error('amenities')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="submit" class="btn btn-primary" value="Submit" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
