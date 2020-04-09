@extends('layouts.app')
<link href="{{ asset('css/orders/order.confirmed.css') }}" rel="stylesheet">
@section('content')
    <h1>Order Confirmation</h1>
    <p>Thank you for your purchase! Your order will be ready for pickup on <span class="bold-font"> {{ $order->pickup_date }}</span>.</p>
    <p>You will receive an email confirmation.</p>
    <h3>Order Details</h3>
    <hr/>
    <p class="bold-font">Order #{{ $order->id }}</p>

    @foreach($order->products as $product)
        <div class="prod-container">
            @if($product->pivot->quantity > 1)
            <div class="product">{{$product->pivot->quantity}} boxes of {{$product->name}}</div>
            @else
            <div class="product">{{$product->pivot->quantity}} box of {{$product->name}}</div>
             @endif
            <div class="price">&dollar;{{$product->pivot->price}}</div>
        </div>
    @endforeach

    <p>Pickup Date: {{ $order->pickup_date }}</p>
    <p class="bold-font">Total: &dollar;{{ $order->price }}</p>

@endsection
