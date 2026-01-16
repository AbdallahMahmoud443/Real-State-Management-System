@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Pricing Packages</h1>
            <div class="ml-auto">
                <a href="{{ route('admin.package.create.show') }}" class="btn btn-primary">
                    Add New Package</a>
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
                                            <th>Price</th>
                                            <th>Allowed Days</th>
                                            <th>Allowed Properties</th>
                                            <th>Allowed Features</th>
                                            <th>Allowed Photos</th>
                                            <th>Allowed videos</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pricingPackages as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->allowed_days }}</td>
                                                <td>{{ $item->Properties }}</td>
                                                <td>{{ $item->Features }}</td>
                                                <td>{{ $item->allowed_photos }}</td>
                                                <td>{{ $item->allowed_videos }}</td>
                                                <td class="pt_10 pb_10 d-flex justify-content-evenly">
                                                    <a href="{{ route('admin.package.edit', $item->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('admin.package.delete.handle', $item->id) }}"
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
