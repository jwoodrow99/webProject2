@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@section('content')

    <h2>Choose Payment Option</h2>

    <h3>Pay In-Store</h3>
    {{--    <form method="POST" action="{{ action('OrderController@store') }}" enctype="multipart/form-data">--}}
    {{--        {{ csrf_field() }}--}}
    {{--        <label for="pickupName">Pickup Name</label>--}}
    {{--        <input name="pickupName" type="text" value="{{ $currentUser->customer->name }}"><br/>--}}
    {{--        <button type="submit">Order</button>--}}
    {{--    </form>--}}

    <h3>Prepay Online</h3>
    <form id="payment-form" method="POST" action="{{ action('OrderController@store') }}" enctype="multipart/form-data">
{{--    <form id="payment-form" method="POST" action="{{ action('CheckoutController@index') }}" enctype="multipart/form-data">--}}
{{--    <form id="payment-form">--}}
{{--        {{ method_field('PATCH') }}--}}
        {{ csrf_field() }}
        <h4>Billing Address</h4>
        <label for="name">Name</label>
        <input id="name" name="name" type="text" value="{{ $currentUser->customer->name }}" required><br/>

        <label for="address">Address</label>
        <input id="address" name="address" type="text" value="{{ $currentUser->customer->address }}" required><br/>

        <label for="city">City</label>
        <input id="city" name="city" type="text" value="{{ $currentUser->customer->city }}" required><br/>

        <label for="province">Province</label>
        <input id="province" name="province" type="text" value="{{ $currentUser->customer->province }}" required><br/>

        <label for="postal">Postal Code</label>
        <input id="postal" name="postal" type="text" value="{{ $currentUser->customer->postal }}" required><br/>

        <label for="phone">Phone Number</label>
        <input id="phone" name="phone" type="tel" value="{{ $currentUser->customer->phone }}" required><br/>

        <h4>Pickup Date</h4>
        <label for="pickupDate">Date</label>
        <input id="pickupDate" name="pickupDate" type="date" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" required><br/>

        <h4>Payment Information</h4>

        <div id="card-element">
            <!-- Stripe Element/Form Field will be inserted here -->
        </div>

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>

        <button id="card-button">
            Process Payment
        </button>
    </form>

    {{--    <a href="{{ action('OrderController@store') }}">[CHECKOUT]</a>--}}
@endsection
