@extends('admin.layouts.app')
@section('content')
    <section>
        <h2>Welcome {{ Auth::guard('admin')->user()->name }} to dashboard Admin</h2>
    </section>
@endsection
