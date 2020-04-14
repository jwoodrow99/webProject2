@extends('layouts.app')
<link href="{{ asset('css/customer/customer.edit.css') }}" rel="stylesheet">

@section('content')
    <h3>Finish Setting Up Your Account</h3>
    <div class="update-container">
        <form method="post" action="{{ action('CustomerController@store') }}" enctype="multipart/form-data">

            {{ csrf_field() }}
            <div class="usr-info">
                <div class="usr-lbl">
                    <label for="address">Address</label><br/>
                    <label for="city">City</label><br/>
                    <label for="province">Province</label><br/>
                    <label for="postal">Postal Code</label><br/>
                    <label for="phone">Phone Number</label><br/>
                </div>
                <div class="usr-input">
                    <input id="address" name="address" type="text" required><br/>
                    <input id="city" name="city" type="text" required><br/>
                    <input id="province" name="province" type="text" required><br/>
                    <input id="postal" name="postal" type="text" required><br/>
                    <input id="phone" name="phone" type="text" required><br/>
                </div>
            </div>

            <input type="submit" value="Create!">
        </form>
    </div>
@endsection
