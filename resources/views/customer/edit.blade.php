
@extends('layouts.app')

@section('content')
    <form method="post" action="{{ action('CustomerController@update', $customer->id) }}" enctype="multipart/form-data">

        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <label for="name">Name: </label>
        <input name="name" type="text" value="{{ $customer->name }}"><br>

        <label for="email">Email: </label>
        <input name="email" type="email" value="{{ $customer->user->email }}"><br>

        <label for="address">Address: </label>
        <input name="address" type="text" value="{{ $customer->address }}"><br>

        <label for="city">City: </label>
        <input name="city" type="text" value="{{ $customer->city }}"><br>

        <label for="province">Province: </label>
        <input name="province" type="text" value="{{ $customer->province }}"><br>

        <label for="postal">Postal: </label>
        <input name="postal" type="text" value="{{ $customer->postal }}"><br>

        <label for="phone">Phone: </label>
        <input name="phone" type="text" value="{{ $customer->phone }}"><br>

        <input type="submit" value="Submit!">
    </form>
@endsection
