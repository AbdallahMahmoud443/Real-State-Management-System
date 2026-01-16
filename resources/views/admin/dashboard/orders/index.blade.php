@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Orders</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>SL</th>
                                            <th>Invoice Id</th>
                                            <th>Package</th>
                                            <th>Agent</th>
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

                                                </td>
                                                <td>{{ $order->package->name }}</td>
                                                <td>{{ $order->agent->name }}</td>
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
                                                    @if ($order->currently_active == 1)
                                                        <span class="badge bg-success">{{ __('Currently Active') }}</span>
                                                    @else
                                                        <span class="badge bg-danger">{{ __('Expired') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($order->currently_active == 1)
                                                        <a href="{{ route('admin.orders.printInvoice', $order->id) }}"
                                                            class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a>
                                                    @else
                                                        <span class="badge bg-info text-dark">{{ __('No Action') }}</span>
                                                    @endif

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
