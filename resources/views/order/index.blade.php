@extends('layouts.app')
<link href="{{ asset('css/orders/order.index.css') }}" rel="stylesheet">
@section('content')
<h1>Your Orders</h1>
<div class="order-container">
    <div class="update-info">
    {{--    @foreach($customer->customers as $customer)--}}
    {{--    @if(!Auth::user()->hasRole('manager'))--}}
    {{--        <button><a href="{{ action('OrderController@index', $customer->id) }}">Your Orders</a></button>--}}{{-- user doesnt have manager role but has access to manager view--}}
    {{--    @else--}}
    {{--        <a href="{{ action('AdminController@orders') }}">[VIEW ORDERS]</a>--}}
    {{--    @endif--}}
    {{--    <br/>--}}
    {{--    <button><a href="{{ action('CustomerController@edit', $customer->id) }}">Update Your Information</a></button>--}}
    {{--        @endforeach--}}
        <button>Your Order</button>
        <button>Account Information</button>
    </div>
    <div class="order-content">

        <h2>Orders</h2>
        <ol>

            @foreach($user_orders as $order)
                    @if($order->deleted_at != null)
                        <li style="color: tomato">
                    @else
                        <li>
                    @endif
                            <span class="order-info order-id">Order #{{$order->id}}</span><br>


{{--                    Paid: {{$order->paid}}<br>--}}
{{--                    Order Placed: {{$order->created_at}}<br>--}}
                    Pickup Date: {{$order->pickup_date}}<br>
                    <ul>
                        Products:
                        @foreach($order->products as $product)
                            <li class="order-item">
                                <div class="item-unit">
                                    {{$product->pivot->size}} Box of {{$product->name}}<br>
                                    {{$product->pivot->quantity}} Boxes of {{$product->name}}<br>
                                </div>
{{--                                Pickup Date: {{$order->pickup_date}}<br>--}}
                                <div class="price">
                                    <!--Total Price:-->&dollar;{{$product->pivot->price}}<br/>
                                    <!--Unit Price:-->&dollar;{{$product->price}}<br/>
                                </div>
                            </li>
                            <br/>
                        @endforeach
                    </ul>
                    <span class="total">Total: &dollar;{{$order->price}}</span><br>
                    <form method="POST" action="{{ action('OrderController@reorder', $order->id) }}">

                @if($order->pickup_date >= now()->toDateString())
                    <form method="POST" action="{{ action('OrderController@destroy', $order->id) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <span class="btn-rep"><input type="submit" value="Re-Purchase"></span>
                    </form>


                    @if($order->pickup_date >= now())
                        <form method="POST" action="{{ action('OrderController@destroy', $order->id) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="submit" value="[DELETE]">
                        </form>
                    @endif
                </li>
                <br>
            @endforeach

        </ol>
    </div>
</div>
@endsection
