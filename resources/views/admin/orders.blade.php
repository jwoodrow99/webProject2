@extends('layouts.admin')
<link href="{{ asset('css/admin/admin.orders.css') }}" rel="stylesheet">
@section('content2')
<div class="order-container">
    <h2>All Orders</h2>
    <div class="heading-container">
        <div class="order-heading">
                <span class="heading"> Order Number</span>
                <span class="heading"> Customer</span>
                <span class="heading"> Pickup Date</span>
                <span class="heading"> Total</span>
                <span class="heading"> Paid</span>
                <span class="heading"> Picked Up</span>
        </div>
    </div>
    <div class="order-list">
        @foreach($orders as $order)
            <div class="order">
                <span class="order-item"> {{$order->id}}</span>
                <span class="order-item"> {{$order->user->name}}</span>
                <span class="order-item"> {{$order->pickup_date}}</span>
                <span class="order-item"> {{$order->price}}</span>

                @if($order->paid)
                   <span class="order-item order-paid">PAID</span>
                @else
                    <span class="order-item order-not-paid"> NOT PAID</span>
                @endif

                @if($order->picked_up)
                    <span class="order-item order-picked-up"> Picked Up</span>
                @else
                    <span class="order-item order-waiting"> Waiting</span>
                @endif


                <span class="order-item"> <a href="{{ action('OrderController@show', $order->id) }}"><button class="order-btn">View Order</button></a></span>


                @if($order->pickup_date >= now()->toDateString())
                    <form method="POST" action="{{ action('OrderController@destroy', $order->id) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" value="[DELETE]">
                    </form>
                @endif
            </div>
        @endforeach
    </div>
</div>
<div class="removed-orders">
    <h2>Removed Orders</h2>
    <div class="removed-orders-heading">
        <span class="rm-heading"> Order Number</span>
        <span class="rm-heading">Customer</span>
        <span class="rm-heading"> Pickup Date</span>
        <span class="rm-heading"> Total</span>
        <span class="rm-heading"> View Button</span>
    </div>
    <div class="rm-order-list">
        @foreach($trashedOrders as $order)
                <span class="rm-order-item"> {{$order->id}}</span>
                <span class="rm-order-item"> {{$order->user->name}}</span>
                <span class="rm-order-item"> {{$order->pickup_date}}</span>
                <span class="rm-order-item"> {{$order->price}}</span>
                    <a href="{{ action('OrderController@show', $order->id) }}">VIEW ORDER</a>
    @endforeach
    </div>
</div>
@endsection
