@extends('user.layouts.app')
@section('content')
    <section>
        <h2>Welcome {{ Auth::guard('web')->user()->name }} to dashboard User</h2>
    </section>
@endsection
