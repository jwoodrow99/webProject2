@extends('layouts.app')
<link href="{{ asset('css/cart/cart.edit.css') }}" rel="stylesheet">
@section('content')
    <h1> Edit Cart</h1>
    <div class="edit-cart-container">
        <form method="post" action="{{ action('CartController@update', $cart->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="edit-fields">
                <span>
                    <label for="size">Size: </label><br/>
                     <label for="quantity">Quantity: </label><br/>
                </span>
                <span>
                    <input name="size" type="text" value="{{$cart->size}}"><br>
                    <input name="quantity" type="text" value="{{$cart->quantity}}"><br>
                </span>
            </div>
            <input type="submit" value="Submit!">
        </form>
    </div>
@endsection
