@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Properties</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Cover</th>
                                            <th>Agent</th>
                                            <th>Type</th>
                                            <th>Location</th>
                                            <th>Purpose</th>
                                            <th>Active?</th>
                                            <th class="w-60">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($properties as $property)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $property->title }}</td>
                                                <td>
                                                    <img src='{{ asset($property->cover) }}' width="100"
                                                        height="100" />
                                                </td>
                                                <td>{{ $property->agent->name }}</td>
                                                <td>{{ $property->type->name }}</td>
                                                <td>{{ $property->location->name }}</td>
                                                <td>{{ $property->status }}</td>
                                                <td>
                                                    @if ($property->is_active == 1)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                    <a href="{{ route('admin.properties.update', $property->id) }}"
                                                        class="btn {{ $property->is_active == '1' ? 'btn-danger' : 'btn-success' }}">
                                                        <i class="fas fa-thumbs-up"></i>
                                                    </a>
                                                </td>
                                                <td class="">
                                                    <a href="{{ route('admin.properties.show', $property->id) }}"
                                                        class="btn btn-primary">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
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
        </div>
    </section>
@endsection
