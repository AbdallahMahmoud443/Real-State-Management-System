@extends('layouts.app')
@section('content')
    <x-frontend.banner title="Customer Dashboard" />
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('user.layouts.sidebar')
                <div class="col-lg-9 col-md-12">
                    <h3>Hello, {{ Auth::guard('web')->user()->name }}</h3>
                    <p>See all the statistics at a glance:</p>

                    <div class="row box-items">
                        <div class="col-md-4">
                            <div class="box1">
                                <h4>2</h4>
                                <p>Wish List Items</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box2">
                                <h4>3</h4>
                                <p>Orders</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box3">
                                <h4>5</h4>
                                <p>Featured Properties</p>
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-5">Recent Properties</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1375 Stanley Avenue</td>
                                    <td>Villa</td>
                                    <td>New York</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm text-white"><i
                                                class="fas fa-edit"></i></a>
                                        <a href="" class="btn btn-danger btn-sm"
                                            onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>3780 Ash Avenue</td>
                                    <td>Condo</td>
                                    <td>Boston</td>
                                    <td>
                                        <span class="badge bg-danger">Pending</span>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm text-white"><i
                                                class="fas fa-edit"></i></a>
                                        <a href="" class="btn btn-danger btn-sm"
                                            onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
