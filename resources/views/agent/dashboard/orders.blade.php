@extends('layouts.app')
@section('content')
    <x-frontend.banner title="Orders" />
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('agent.layouts.sidebar')
                <div class="col-lg-9 col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Invoice Id</th>
                                    <th>Package Name</th>
                                    <th>Price</th>
                                    <th>Payment Date</th>
                                    <th>Expire Date</th>
                                    <th>Total Days</th>
                                    <th>Days Remaining</th>
                                    <th>
                                        Payment Method & Transaction Id
                                    </th>
                                    <th>Status</th>
                                    <th>Print Invoice</th>
                                </tr>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            INV-{{ $order->id }}
                                            <br />
                                            @if ($order->currently_active == 1)
                                                <span class="badge bg-success">Currently Active</span>
                                            @else
                                                <span class="badge bg-danger">Expire</span>
                                            @endif
                                        </td>
                                        <td>{{ $order->package->name }}</td>
                                        <td>${{ $order->paid_amount }}</td>
                                        <td>{{ $order->purchase_date }}</td>
                                        <td>{{ $order->expire_date }}</td>
                                        <th>
                                            {{ $order->total_days }}
                                        </th>
                                        <th>
                                            @if ($order->currently_active == 1)
                                                {{ $order->days_remaining }}
                                            @else
                                                0
                                            @endif

                                        </th>
                                        <td style="word-wrap: break-word; word-break: break-all;">
                                            <b>{{ $order->payment_method }}</b><br>
                                            {{ $order->transaction_id }}
                                        </td>
                                        <td>
                                            @if ($order->status == 'completed')
                                                <span class="badge bg-success">{{ $order->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $order->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('agent.invoice.handle', $order->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a>
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
