@extends('layouts.admin')

@section('content2')

    <h3>All Orders</h3>

    <table>
        <tr style="border-bottom: 1px solid black">
            <th>Order Id</th>
            <th>Customer</th>
            <th>Pickup Date</th>
            <th>Total</th>
            <th>Paid</th>
            <th>Picked Up</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user->name}}</td>
                <td>{{$order->pickup_date}}</td>
                <td>{{$order->price}}</td>

                @if($order->paid)
                    <td style="color: green">PAID</td>
                @else
                    <td style="color: tomato">NOT PAID</td>
                @endif

                @if($order->picked_up)
                    <td style="color: green">Picked Up</td>
                @else
                    <td style="color: tomato">Waiting</td>
                @endif

                <td>
                    <a href="{{ action('OrderController@show', $order->id) }}">VIEW ORDER</a>
                </td>
                <td>
                    @if($order->pickup_date >= now()->toDateString())
                        <form method="POST" action="{{ action('OrderController@destroy', $order->id) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="submit" value="[DELETE]">
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>

    <h2>Removed Orders</h2>
    <table>
        <tr>
            <th>Order Id</th>
            <th>Customer</th>
            <th>Pickup Date</th>
            <th>Total</th>
            <th>View Button</th>
        </tr>
        @foreach($trashedOrders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user->name}}</td>
                <td>{{$order->pickup_date}}</td>
                <td>{{$order->price}}</td>
                <td>
                    <a href="{{ action('OrderController@show', $order->id) }}">VIEW ORDER</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
