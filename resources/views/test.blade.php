@extends('layouts.app')

@section('content')

    <h1>TEST!</h1>

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
            <br>
        @endforeach
    </ul>
@endsection
