@extends('layouts.app')

@section('content')
    <section>
        <x-frontend.banner title="Pricing" />
        <div class="page-content pricing">
            <div class="container">
                <div class="row pricing">
                    @foreach ($pricingPackages as $item)
                        <div class="col-lg-4 mb_30">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-body">
                                    <h2 class="card-title">{{ $item->name }}</h2>
                                    <h3 class="card-price">${{ $item->price }}</h3>
                                    <h4 class="card-day">({{ $item->allowed_days }} Days)</h4>
                                    <hr />
                                    <ul class="fa-ul">
                                        <li>
                                            <span class="fa-li"><i class="fas fa-check"></i></span>{{ $item->Properties }}
                                            Properties
                                            Allowed
                                        </li>
                                        <li>
                                            <span class="fa-li"><i class="fas fa-times"></i></span>{{ $item->Features }}
                                            Featured
                                            Property
                                        </li>
                                        <li>
                                            <span class="fa-li"><i
                                                    class="fas fa-check"></i></span>{{ $item->allowed_photos }}
                                            Photos per Property
                                        </li>
                                        <li>
                                            <span class="fa-li"><i
                                                    class="fas fa-check"></i></span>{{ $item->allowed_videos }} Videos per
                                            Property
                                        </li>
                                    </ul>
                                    <div class="buy">
                                        <a href="" class="btn btn-primary">
                                            Choose Plan
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>
@endsection
