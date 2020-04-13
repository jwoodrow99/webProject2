@extends('layouts.app')
<link href="{{ asset('css/layouts/app.css') }}" rel="stylesheet">
@section('content')
    <div class="admin-container">
        <h1>ADMINISTRATION</h1>
        <nav class="admin-nav">
            <a href="{{ url('admin') }}"><button>Inventory</button></a>
            <a href="{{ url('admin/orders') }}"><button>All Orders</button></a>
            <a href="{{ url('admin/user') }}"><button>All Users</button></a>
            <a href="{{ url('admin/newsletter') }}"><button>Send Newsletter</button></a>
        </nav>
    </div>
    <main>
        @yield('content2')
    </main>
@endsection
