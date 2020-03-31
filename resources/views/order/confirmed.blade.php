@extends('layouts.app')

@section('content')
    <h2>Order Confirmation</h2>
    <p>Thank you for your purchase! Your order will be ready for pickup on {{ $order->pickup_date }}</p>

    <h5>Order Details</h5>
    <p>Order # {{ $order->id }}</p>
    @foreach($order->products as $product)
        <p>
            {{$product->pivot->quantity}} {{$product->name}} | {{$product->pivot->price}}
        </p>
    @endforeach
    <p>Pickup Date: {{ $order->pickup_date }}</p>
    <p>Total: {{ $order->price }}</p>
@endsection
