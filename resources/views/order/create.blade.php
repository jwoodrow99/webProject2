@extends('layouts.app')

@section('content')

    <h2>Choose Payment Option</h2>

    <h3>Pay In-Store</h3>
    <form method="POST" action="{{ action('OrderController@store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="pickupName">Pickup Name</label>
        <input name="pickupName" type="text" value="{{ $currentUser->customer->name }}"><br/>
        <button type="submit">Order</button>
    </form>

    <h3>Prepay Online</h3>
    <form id="payment-form" method="POST" action="{{ action('OrderController@store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h4>Billing Address</h4>
        <label for="name">Name</label>
        <input name="name" type="text" value="{{ $currentUser->customer->name }}"><br/>

        <label for="address">Address</label>
        <input name="address" type="text" value="{{ $currentUser->customer->address }}"><br/>

        <label for="city">City</label>
        <input name="city" type="text" value="{{ $currentUser->customer->city }}"><br/>

        <label for="province">Province</label>
        <input name="province" type="text" value="{{ $currentUser->customer->province }}"><br/>

        <label for="postal">Postal Code</label>
        <input name="postal" type="text" value="{{ $currentUser->customer->postal }}"><br/>

        <label for="phoneNumber">Phone Number</label>
        <input name="phoneNumber" type="tel" value="{{ $currentUser->customer->phone }}"><br/>

        <h4>Pickup Date</h4>
        <label for="pickupDate">Date</label>
        <input name="pickupDate" type="date"><br/>

        <h4>Payment Information</h4>
        <div id="stripe-element"></div>

        <div id="card-element">
            <!-- Stripe Element/Form Field will be inserted here -->
        </div>

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>

        <button type="submit">Order</button>
    </form>

{{--    <a href="{{ action('OrderController@store') }}">[CHECKOUT]</a>--}}
@endsection
