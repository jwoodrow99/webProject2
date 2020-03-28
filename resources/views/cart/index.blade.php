@extends('layouts.app')
<link href="{{ asset('css/cart/cart.index.css') }}" rel="stylesheet">

@section('content')
    <h1>Shopping Cart</h1>

    <ul>
        @foreach($cart as $item)
            <li>
{{--                Product Id: {{$item->id}}<br>--}}
{{--                Product Code: {{$item->product->product_code}}<br>--}}
                <div class="prod-container">
                    <div class="prod-image">
                        <img src="{{ asset('storage/' . $item->image) }}">
                    </div>
                    <div class="prod-info">
                        <p class="para"><span class="prod-name"> {{$item->product->name}}</span></p>
                        <p class="para"><span class="prod-price">&dollar;{{$item->product->price}}</span> per 10lb. box</p>

                        <p class="para">Number of Boxes {{$item->quantity}}<a href="{{ action('CartController@edit', $item->id) }}"><span class="prod-edit"> [EDIT] </span></a></p>
                        <p class="para">Number of pieces for <strong> each box </strong>{{$item->size}}<a href="{{ action('CartController@edit', $item->id) }}"><span class="prod-edit"> [EDIT] </span></a></p>

        {{--                Total Price: ${{$item->product->price * $item->quantity}}<br>--}}

                        <form method="POST" action="{{ action('CartController@destroy', $item->id) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="submit" value="Delete">
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

    <hr>
    <div class="prod-sum">
        <h2>Order Summary</h2>
        <p class="para">Total Price: ${{$totalPrice}}</p>

        <button class="prod-checkout">
            <a href="{{ action('OrderController@create') }}">Checkout</a>
        </button>
    </div>
@endsection
