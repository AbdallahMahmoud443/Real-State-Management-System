@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Locations</h1>
            <div class="ml-auto">
                <a href="{{ route('admin.location.create') }}" class="btn btn-primary">
                    Add New Location</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Total Properties</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($locations as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ asset($item->photo) }}" alt="" width="100px"
                                                        height="100px">
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->slug }}</td>
                                                <td>{{ $item->total_properties }}</td>
                                                <td class="pt_10 pb_10 d-flex border-0 justify-content-center ">

                                                    <a href="{{ route('admin.location.edit', $item->id) }}"
                                                        class="btn btn-primary mx-2"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('admin.location.destroy', $item->id) }}"
                                                        method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger"
                                                            onClick="return confirm('Are you sure?');"><i
                                                                class="fas fa-trash"></i></button>
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
        </div>
    </section>
@endsection
