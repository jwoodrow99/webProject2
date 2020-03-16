@extends('layouts.app')

@section('content')

    <form method="post" action="{{ action('CartController@update', $cart->id) }}" enctype="multipart/form-data">

        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <label for="size">Size: </label>
        <input name="size" type="text" value="{{$cart->size}}"><br>

        <label for="quantity">Quantity: </label>
        <input name="quantity" type="text" value="{{$cart->quantity}}"><br>

        <input type="submit" value="Submit!">
    </form>

@endsection
