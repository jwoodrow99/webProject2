@extends('layouts.app')
<link href="{{ asset('css/layouts/app.css') }}" rel="stylesheet">
@section('content')
    <h1>ADMINISTRATION</h1>
    <nav class="admin-nav">
        <a href="{{ url('admin') }}">Administrator</a>
        <a href="{{ url('admin/orders') }}">All Orders</a>
        <a href="{{ url('admin/user') }}">All Users</a>
    </nav>

    <main>
        @yield('content2')
    </main>
@endsection
