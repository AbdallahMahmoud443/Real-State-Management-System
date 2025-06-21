@extends('layouts.app')
@section('content')
    <x-frontend.banner title="Payment" />
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('agent.layouts.sidebar')
                <div class="col-lg-9 col-md-12">
                    @if ($activeOrder)
                        <h4>Current Plan</h4>
                        <div class="row box-items mb-4">
                            <div class="col-md-4">
                                <div class="box1">
                                    <h4>${{ $activeOrder->paid_amount }}</h4>
                                    <p>{{ $activeOrder->package->name }}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-danger">
                            you Don't have Plan,can't published any property in website
                        </div>
                    @endif
                    <h4>Upgrade Plan (Make Payment)</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered upgrade-plan-table">
                            <form action="{{ route('agent.paypal.handle') }}" method="post">
                                @csrf
                                @method('POST')
                                <tr>
                                    <td>
                                        <select name="package_id" class="form-control select2">
                                            @foreach ($packages as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                    (${{ $item->price }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-secondary btn-sm buy-button">Pay with
                                            PayPal</button>
                                    </td>
                                </tr>
                            </form>
                            <form action="" method="post">
                                @csrf
                                <tr>
                                    <td>
                                        <select name="package_id" class="form-control select2">
                                            @foreach ($packages as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                    (${{ $item->price }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-secondary btn-sm buy-button">Pay with
                                            Stripe</button>
                                    </td>
                                </tr>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
