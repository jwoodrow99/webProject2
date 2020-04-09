@extends('layouts.app')
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
<link href="{{ asset('css/orders/order.create.css') }}" rel="stylesheet">
@section('content')

    <h1>Choose Payment Option</h1>

    <h3>Pay In-Store</h3>
    <hr>
        <form method="POST" action="{{ action('OrderController@store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <p>Enter the name of who will pick up the dog food</p>
            <label for="pickupName">Pickup Name</label>
            <input name="pickupName" type="text" value="{{ $currentUser->customer->name }}"><br/>

            <h5>Pickup Date</h5>
            <label for="pickupDate">Date</label>
            <input id="pickupDate" name="pickupDate" type="date" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" required><br/>

            <button id="payinStore" type="submit">Pay in store</button>
        </form>

    <h3>Prepay Online</h3>
    <hr/>
    <form id="payment-form" method="POST" action="{{ action('OrderController@store') }}" enctype="multipart/form-data">
{{--    <form id="payment-form" method="POST" action="{{ action('CheckoutController@index') }}" enctype="multipart/form-data">--}}
{{--    <form id="payment-form">--}}
{{--        {{ method_field('PATCH') }}--}}
        {{ csrf_field() }}
        <div class="online-pmt-container">

            <div class="bill-info">
                <span class="bill-labels">
{{--                    <h4>Billing Address</h4>--}}
                     <label for="name">Name</label><br/>
                    <label for="address">Address</label><br/>
                     <label for="city">City</label><br/>
                    <label for="province">Province</label><br/>
                    <label for="postal">Postal Code</label><br/>
                    <label for="phone">Phone Number</label><br/>
                </span>

                <span class="bill-inputs">
                    <input id="name" name="name" type="text" value="{{ $currentUser->customer->name }}" required><br/>
                    <input id="address" name="address" type="text" value="{{ $currentUser->customer->address }}" required><br/>
                    <input id="city" name="city" type="text" value="{{ $currentUser->customer->city }}" required><br/>
                    <input id="province" name="province" type="text" value="{{ $currentUser->customer->province }}" required><br/>
                    <input id="postal" name="postal" type="text" value="{{ $currentUser->customer->postal }}" required><br/>
                    <input id="phone" name="phone" type="tel" value="{{ $currentUser->customer->phone }}" required><br/>
                </span>
            </div>
            <div class="online-pmt-info">
{{--                <h4>Payment Information</h4>--}}
{{--                <span class="online-pmt-labels">--}}
{{--                    <label for="cardName">Name on card</label><br/>--}}
{{--                    <label for="cardNum">Card Number</label><br/>--}}
{{--                    <label for="CCV">CCV</label><br/>--}}
{{--                </span>--}}
{{--                <span class="online-pmt-inputs">--}}
{{--                    <input id="cardName" name="cardName" type="text" required="required"><br/>--}}
{{--                    <input id="cardNum" name="cardNum" type="number" required="required"><br/>--}}
{{--                    <input id="CCV" name="CCV" type="number" required="required"><br/>--}}
                    <div id="card-element">
                    <!-- Stripe Element/Form Field will be inserted here -->
                    </div>

                <span class="pickupDate">
                    <label for="pickupDate">Pick up date</label>
                    <input id="pickupDate" name="pickupDate" type="date" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" required><br/>
                </span>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>
        </div>
        <button class="online-pmt-btn">
            Process Payment
        </button>
    </form>

    {{--    <a href="{{ action('OrderController@store') }}">[CHECKOUT]</a>--}}
@endsection

@section('stripeScripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/checkout.js') }}" defer></script>
@endsection
