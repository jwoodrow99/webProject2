
@extends('layouts.app')
<link href="{{ asset('css/customer/customer.edit.css') }}" rel="stylesheet">
@section('content')
    <h1>Update Information</h1>
    <div class="update-container">
        <form method="post" action="{{ action('CustomerController@update', $customer->id) }}" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="usr-info">
                <div class="usr-lbl">
                   <span> <label for="name">Name: </label></span>
                    <span><label for="email">Email: </label></span>
                    <span><label for="address">Address: </label></span>
                    <span><label for="city">City: </label></span>
                    <span><label for="province">Province: </label></span>
                    <span><label for="postal">Postal: </label></span>
                    <span><label for="phone">Phone: </label></span>
                </div>
                <div class="usr-input">
                    <input name="name" type="text" value="{{ $customer->name }}"><br>
                    <input name="email" type="email" value="{{ $customer->user->email }}"><br>
                    <input name="address" type="text" value="{{ $customer->address }}"><br>
                    <input name="city" type="text" value="{{ $customer->city }}"><br>
                    <input name="province" type="text" value="{{ $customer->province }}"><br>
                    <input name="postal" type="text" value="{{ $customer->postal }}"><br>
                    <input name="phone" type="number" value="{{ $customer->phone }}"><br>
                </div>
            </div>

            @if($customer->user->newsletter == true)
                <label for="nltrue">I would like to get the newsletter </label>
                <input checked type="radio" id="nltrue" name="newsletter" value="true"><br>

                <label for="nlfalse">I dont want to get the newsletter </label>
                <input type="radio" id="nlfalse" name="newsletter" value="false"><br>
            @else
                <label for="nltrue">I would like to get the newsletter </label>
                <input type="radio" id="nltrue" name="newsletter" value="true"><br>

                <label for="nlfalse">I dont want to get the newsletter </label>
                <input checked type="radio" id="nlfalse" name="newsletter" value="false"><br>
            @endif

            <input type="submit" value="Submit!">
        </form>
    </div>
@endsection
