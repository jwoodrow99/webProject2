@extends('layouts.app')
<link href="{{ asset('css/customer/customer.index.css') }}" rel="stylesheet">

@section('content')
    <h1>Your Account</h1>
<div class="cust-container">

    <div class="update-info">
        @if(!Auth::user()->hasRole('manager'))
            <a href="{{ action('OrderController@index', $customer->id) }}"><button>Your Orders</button></a>{{-- user doesnt have manager role but has access to manager view--}}
        @else
            <button><a href="{{ action('AdminController@orders') }}">View Orders</a></button>
        @endif
        <br/>
        <a href="{{ action('CustomerController@edit', $customer->id) }}"><button>Update Your Information</button></a>
    </div>

    <div class="acc-container">

        <div  class="acc-header">
            <h3>Account Information</h3>
        </div>
        <div class="user-info">
            <div class="cust-label">
        {{--        Customer Id: {{ $customer->id }} <br>--}}
        {{--        User Id: {{ $customer->user_id }} <br>--}}
                <span class="cust-label">Name:</span>
                <span class="cust-label">Address:</span>
                <span class="cust-label">City:</span>
                <span class="cust-label">Province:</span>
                <span class="cust-label">Postal:</span>
                <span class="cust-label">Email:</span>
                <span class="cust-label">Phone:</span>
            </div>
            <div class="cust-info">
                <span class="cust-info">{{ $customer->name }}</span>
                <span class="cust-info">{{ $customer->address }}</span>
                <span class="cust-info">{{ $customer->city }}</span>
                <span class="cust-info">{{ $customer->province }}</span>
                <span class="cust-info">{{ $customer->postal }}</span>
                <span class="cust-info">{{ $customer->user->email }}</span>
                <span class="cust-info">{{ $customer->phone }}</span>
            </div>
        </div>
            <p>You can only delete your account if you do not have any open orders!</p>
            <form method="POST" action="{{ action('CustomerController@destroy', $customer->id) }}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <input type="submit" value="Delete Account">
            </form>
    </div>

</div>
@endsection
