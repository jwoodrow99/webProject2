@extends('layouts.app')
<link href="{{ asset('css/customer/customer.index.css') }}" rel="stylesheet">

@section('content')
<div class="cust-container">

    <div class="update-info">
        @if(!Auth::user()->hasRole('manager'))
            <button><a href="{{ action('OrderController@index', $customer->id) }}">Your Orders</a></button>{{-- user doesnt have manager role but has access to manager view--}}
        @else
            <a href="{{ action('AdminController@orders') }}">[VIEW ORDERS]</a>
        @endif
        <br/>
        <button><a href="{{ action('CustomerController@edit', $customer->id) }}">Update Your Information</a></button>
    </div>

    <div class="acc-info">
        <h1>Your Account</h1>
        <h3>Account Information</h3>
            <p>
        {{--        Customer Id: {{ $customer->id }} <br>--}}
        {{--        User Id: {{ $customer->user_id }} <br>--}}
                Name: <span class="cust-info">{{ $customer->name }}</span> <br>
                Address: <span class="cust-info">{{ $customer->address }}</span> <br>
                City: <span class="cust-info">{{ $customer->city }}</span> <br>
                Province: <span class="cust-info">{{ $customer->province }}</span> <br>
                Postal: <span class="cust-info">{{ $customer->postal }}</span> <br>
                Email: <span class="cust-info">{{ $customer->user->email }}</span> <br>
                Phone: <span class="cust-info">{{ $customer->phone }}</span> <br>
            </p>
            <p>You can only delete your account if you do not have any open orders!</p>
            <form method="POST" action="{{ action('CustomerController@destroy', $customer->id) }}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <input type="submit" value="Delete Account">
            </form>
    </div>

</div>
@endsection
