@extends('layouts.app')
<link href="{{ asset('css/orders/order.show.css') }}" rel="stylesheet">
@section('content')
<div class="order-container">
{{--    Status: Picked Up <br/>          --}}

{{--    Products:--}}
    <h1>Order Id: {{$order->id}}</h1>
        Order Placed: {{$order->created_at}}<br>
        Pickup Date: {{$order->pickup_date}}<br>
        Paid: {{$order->paid}}<br>
    <ul>
        @foreach($order->products as $product)
            <li>
                <hr/>
                Product Name: {{$product->name}}<br>
                Size: {{$product->pivot->size}}<br>
                Quantity: {{$product->pivot->quantity}}<br>
                Unit Price: &dollar;{{$product->price}}<br>
                Price: &dollar;{{$product->pivot->price}}<br>
            </li>
        @endforeach
    </ul>
    Total Price: &dollar;{{$order->price}}<br>
    <div class="order-btns">
        <form method="POST" action="{{ action('OrderController@reorder', $order->id) }}">
            {{ csrf_field() }}
            <input type="submit" value="Re-Order" class="re-order-btn">
        </form>

        @if($order->pickup_date >= now()->toDateString())
            <form method="POST" action="{{ action('OrderController@destroy', $order->id) }}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <input type="submit" value="Delete" class="del-order-btn">
            </form>
        @endif
    </div>
</div>
@endsection
