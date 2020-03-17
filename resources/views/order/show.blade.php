@extends('layouts.app')

@section('content')

    Order Id: {{$order->id}}<br>
    Price: {{$order->price}}<br>
    Paid: {{$order->paid}}<br>
    Order Placed: {{$order->created_at}}<br>
    Pickup Date: {{$order->pickup_date}}<br>
    Products:
    <ul>
        @foreach($order->products as $product)
            <li>
                Name: {{$product->name}}<br>
                Size: {{$product->pivot->size}}<br>
                Quantity: {{$product->pivot->quantity}}<br>
                Unit Price: {{$product->price}}<br>
                Total Price: {{$product->pivot->price}}<br>
            </li>
        @endforeach
    </ul>

    <form method="POST" action="{{ action('OrderController@reorder', $order->id) }}">
        {{ csrf_field() }}
        <input type="submit" value="[RE-ORDER]">
    </form>

    @if($order->pickup_date >= now())
        <form method="POST" action="{{ action('OrderController@destroy', $order->id) }}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <input type="submit" value="[DELETE]">
        </form>
    @endif

@endsection
