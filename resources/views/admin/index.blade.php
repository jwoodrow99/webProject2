@extends('layouts.admin')
<link href="{{ asset('css/admin/admin.index.css') }}" rel="stylesheet">
@section('content2')
    <section class="products">
        <h1>Inventory</h1>
        <div class="prod-heading">
            <span class="heading">Name</span>
            <span class="heading">Product Code</span>
            <span class="heading">Quantity</span>
            <span class="heading">Update stock</span>
        </div>
{{--        <div class="prod-list">--}}
            @foreach($products as $product)
                <div class="prod">
                    <span class="prod-item"> {{$product->name}}</span><br/>
                    <span class="prod-item"> {{$product->product_code}}</span>
                    <span class="prod-item">{{$product->quantity}}</span>

                    <div class="inv-btn">
                    <form method="post" action="{{ action('AdminController@addStock', $product->id) }}" enctype="multipart/form-data" class="prod-item">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <input type="submit" value="+">
                    </form>

                    <form method="post" action="{{ action('AdminController@removeStock', $product->id) }}" enctype="multipart/form-data" class="prod-item">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <input type="submit" value="-">
                    </form>


                    <a href="{{ action('ProductController@edit', $product->id) }}" class="prod-item">[UPDATE]</a>
                    <form method="POST" action="{{ action('ProductController@destroy', $product->id) }}" class="prod-item">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" value="[DELETE]">
                    </form>
                    </div>
                </div>
            @endforeach
{{--        </div>--}}
    </section>

{{--    <section class="todayOrder">--}}
{{--        <h3>Todays Orders</h3>--}}
{{--        <p>These are the orders that are due to be picked up today!</p>--}}
{{--        <table>--}}
{{--            <tr>--}}
{{--                <th>Order Id</th>--}}
{{--                <th>Customer</th>--}}
{{--                <th>Pickup Date</th>--}}
{{--                <th>Total</th>--}}
{{--            </tr>--}}
{{--            @foreach($orders as $order)--}}
{{--                <tr>--}}
{{--                    <td>{{$order->id}}</td>--}}
{{--                    <td>{{$order->user->name}}</td>--}}
{{--                    <td>{{$order->pickup_date}}</td>--}}
{{--                    <td>{{$order->price}}</td>--}}
{{--                    <td>--}}
{{--                        <form method="post" action="{{ action('AdminController@pickedUp', $order->id) }}" enctype="multipart/form-data">--}}
{{--                            {{ csrf_field() }}--}}
{{--                            {{ method_field('PATCH') }}--}}
{{--                            <input type="submit" value="Picked Up">--}}
{{--                        </form>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <a href="{{ action('OrderController@show', $order->id) }}">VIEW ORDER</a>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <form method="POST" action="{{ action('OrderController@destroy', $order->id) }}">--}}
{{--                            {{ method_field('DELETE') }}--}}
{{--                            {{ csrf_field() }}--}}
{{--                            <input type="submit" value="DELETE">--}}
{{--                        </form>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--        </table>--}}
{{--    </section>--}}
    <a href="{{ action('ProductController@create') }}">NEW PRODUCT</a>
@endsection
