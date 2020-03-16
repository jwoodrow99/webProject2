@extends('layouts.app')

@section('content')

    <ul>
        @foreach($cart as $item)
            <li>
                Product Id: {{$item->id}}<br>
                Product Code: {{$item->product->product_code}}<br>
                Product Name: {{$item->product->name}}<br>
                Product Size: {{$item->size}}<a href="{{ action('CartController@edit', $item->id) }}">[EDIT]</a><br>
                Product Quantity: {{$item->quantity}}<a href="{{ action('CartController@edit', $item->id) }}">[EDIT]</a><br>
                Unit Price: ${{$item->product->price}}<br>
                Total Price: ${{$item->product->price * $item->quantity}}<br>

                <form method="POST" action="{{ action('CartController@destroy', $item->id) }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input type="submit" value="[REMOVE FROM CART]">
                </form>
            </li>
            <br>
        @endforeach
    </ul>

    <hr>

    <h2>Total Price: ${{$totalPrice}}</h2>

    <a href="{{ action('OrderController@create') }}">[CHECKOUT]</a>
@endsection
