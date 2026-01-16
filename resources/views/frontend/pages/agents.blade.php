@extends('layouts.app')

@section('content')
    <section>
        <x-frontend.banner title="Agents" />
        <div class="agent pb_40">
            <div class="container">
                <div class="row">
                    @if (count($agents) > 0)
                        @foreach ($agents as $agent)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="item">
                                    <div class="photo">
                                        <a href="{{ route('agents.details', $agent->id) }}"><img
                                                src="{{ asset($agent->photo) }}" alt=""></a>
                                    </div>
                                    <div class="text">
                                        <h2>
                                            <a href="agent.html">{{ $agent->name }}</a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12">
                            {{ $agents->links() }}
                        </div>
                    @else
                        <span class="text-danger">Agents Not Found </span>
                    @endif

                </div>
            </div>
        </div>

    </section>
@endsection
