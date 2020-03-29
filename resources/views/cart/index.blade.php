@extends('layouts.app')
<link href="{{ asset('css/cart/cart.index.css') }}" rel="stylesheet">

@section('content')
    <h1>Shopping Cart</h1>
    <div class="prod-container">
        <ul>
            @foreach($cart as $item)
                <li>
    {{--                Product Id: {{$item->id}}<br>--}}
    {{--                Product Code: {{$item->product->product_code}}<br>--}}
                        <div class="item-container">
                            <div class="prod-image">
                                <img src="{{ asset('storage/' . $item->image) }}">
                            </div>
                            <div class="prod-info">
                                <p class="para"><span class="prod-name"> {{$item->product->name}}</span><br/>
                                <span class="prod-price">&dollar;{{$item->product->price}}</span> per 10lb. box<br/>
                                    <span class="prod-info-seg">
                                        <span class="para">Number of Boxes {{$item->quantity}}
                                            <button class="prod-edit">
                                                <a href="{{ action('CartController@edit', $item->id) }}">Edit</a>
                                            </button>
                                        </span><br/>
                                        <span class="para">Number of pieces for <strong> each box </strong>{{$item->size}}
                                            <button class="prod-edit">
                                                <a href="{{ action('CartController@edit', $item->id) }}">Edit</a>
                                            </button>
                                        </span>
                                    </span>
                                </p>

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
        <div class="prod-sum">
            <h2>Order Summary</h2>
            <p class="para">
                Subtotal: &dollar;{{$totalPrice}}<br/>
                Taxes: &dollar;{{$totalPrice * 0.13}}<br/>
                Total Price:[SUBTOTAL + TAXES] <br/>

            </p>

            <button class="prod-checkout">
                <a href="{{ action('OrderController@create') }}">Checkout</a>
            </button>
        </div>
    </div>
@endsection
