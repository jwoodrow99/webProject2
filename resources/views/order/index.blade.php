@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Order</div>
                    <div class="card-body">

                        <ol>
                            @foreach($user_orders as $order)
                                <li>
                                    Order Id: {{$order->id}}<br>
                                    Price: {{$order->price}}<br>
                                    Paid: {{$order->paid}}<br>
                                    Order Placed: {{$order->created_at}}<br>
                                    Pickup Date: {{$order->pickup_date}}<br>
                                    Products:
                                    <ul>
                                        @foreach($order->products as $product)
                                            <li>
                                                Name: {{ $product->name }}<br>
                                                Quantity: {{ $product->quantity }}<br>
                                                Unit Price: {{ $product->price }}<br>
                                                Total Price: {{$product->price * $product->quantity}}
                                            </li>
                                        @endforeach
                                    </ul>

                                    <form method="POST" action="{{ action('OrderController@reorder', $order->id) }}">
                                        {{ csrf_field() }}
                                        <input type="submit" value="[RE-ORDER]">
                                    </form>

                                    @if($order->pickup_date > now())
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
            </div>
        </div>
    </div>
@endsection
