@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Amenities</h1>
            <div class="ml-auto">
                <a href="{{ route('admin.amenity.create') }}" class="btn btn-primary">
                    Add New Amenity</a>
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
                                            <th>Name</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($amenities as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td class="pt_10 pb_10 d-flex border-0 justify-content-center ">
                                                    <a href="{{ route('admin.amenity.edit', $item->id) }}"
                                                        class="btn btn-primary mx-2"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('admin.amenity.destroy', $item->id) }}"
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
