
@extends('layouts.app')

@section('content')
    <form method="post" action="{{ action('CustomerController@store') }}" enctype="multipart/form-data">

        {{ csrf_field() }}

        <label for="address">Address: </label>
        <input name="address" type="text"><br>

        <label for="city">City: </label>
        <input name="city" type="text"><br>

        <label for="province">Province: </label>
        <input name="province" type="text"><br>

        <label for="postal">Postal: </label>
        <input name="postal" type="text"><br>

        <label for="phone">Phone: </label>
        <input name="phone" type="text"><br>

        <input type="submit" value="Create!">
    </form>
@endsection
