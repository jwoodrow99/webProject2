@extends('layouts.app')

@section('content')
    <h2>Admin Shit!</h2>
    <nav>
        <a href="{{ url('admin') }}">Admin</a>
        <a href="{{ url('admin/orders') }}">All Orders</a>
        <a href="{{ url('admin/user') }}">Users</a>
    </nav>

    <main>
        @yield('content2')
    </main>
@endsection
