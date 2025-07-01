@extends('layouts.app')
@section('content')
    <x-frontend.banner title="Properties" />
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('agent.layouts.sidebar')
                <div class="col-lg-9 col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Cover</th>
                                    <th>Type</th>
                                    <th>Location</th>
                                    <th>Purpose</th>
                                    <th>Active?</th>
                                    <th class="w-100">Options</th>
                                    <th class="w-60">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($properties as $property)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $property->title }}</td>
                                        <td>
                                            <img src='{{ asset($property->cover) }}' width="100" height="100" />
                                        </td>
                                        <td>{{ $property->type->name }}</td>
                                        <td>{{ $property->location->name }}</td>
                                        <td>{{ $property->status }}</td>
                                        <td>
                                            @if ($property->is_active == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('agent.properties.photos', $property->slug) }}"
                                                class="btn btn-primary btn-sm btn-sm-custom w-100 mb_5">Photo Gallery</a>
                                            <a href="{{ route('agent.properties.videos.show', $property->slug) }}"
                                                class="btn btn-primary btn-sm btn-sm-custom w-100 mb_5">Video Gallery</a>
                                        </td>
                                        <td class="">
                                            <a href="{{ route('agent.properties.edit', $property->id) }}"
                                                class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i></a>

                                            <form action={{ route('agent.properties.destroy', $property->id) }}
                                                method="POST" class='d-inline'>
                                                @csrf
                                                @method('Delete')

                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
