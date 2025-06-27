@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Agents</h1>
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
                                            <th>Email</th>
                                            <th>Photo</th>
                                            <th>Country</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($agents as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                @if (empty($item->photo))
                                                    <td>
                                                        <span class="badge bg-warning text-dark">No Photo </span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <img src="{{ asset($item->photo) }}" alt="Customer Photo"
                                                            class="img-fluid" style="width: 50px; height: 50px;">
                                                    </td>
                                                @endif
                                                @if (empty($item->country))
                                                    <td>
                                                        <span class="badge bg-warning text-dark">No Country</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        {{ $item->country }}
                                                    </td>
                                                @endif
                                                @if (empty($item->address))
                                                    <td>
                                                        <span class=" badge bg-warning text-dark">No Address</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        {{ $item->address }}
                                                    </td>
                                                @endif

                                                @if (empty($item->phone))
                                                    <td>
                                                        <span class=" badge bg-warning text-dark">No phone</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        {{ $item->phone }}
                                                    </td>
                                                @endif
                                                @if ($item->status == 1)
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="badge bg-danger">Inactive</span>
                                                    </td>
                                                @endif

                                                <td class="pt_10 pb_10 d-flex border-0 justify-content-center ">
                                                    <a href="{{ route('admin.agents.edit', $item->id) }}"
                                                        class="btn btn-primary mx-2"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('admin.agents.destroy', $item->id) }}"
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
