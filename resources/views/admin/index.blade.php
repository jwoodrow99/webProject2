@extends('layouts.admin')
<link href="{{ asset('css/admin/admin.index.css') }}" rel="stylesheet">
@section('content2')
    <section class="products">
        <h2>Inventory</h2>
        <div class="prod-heading">
            <span class="heading">Name</span>
            <span class="heading">Product Code</span>
            <span class="heading">Quantity</span>
            <span class="heading">Update stock</span>
        </div>
        <div class="prod-list">
            @foreach($products as $product)
                <div class="prod">
                    <span class="prod-item"> {{$product->name}}</span><br/>
                    <span class="prod-item"> {{$product->product_code}}</span>
                    <span class="prod-item">{{$product->quantity}}</span>

                    <div class="inv-btn">
                        <form method="post" action="{{ action('AdminController@addStock', $product->id) }}" enctype="multipart/form-data" class="add-inv">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input type="submit" value="+">
                        </form>
                        <form method="post" action="{{ action('AdminController@removeStock', $product->id) }}" enctype="multipart/form-data" class="min-inv">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input type="submit" value="-">
                        </form>

                        <a href="{{ action('ProductController@edit', $product->id) }}" class="prod-item"><button class="upd-prod-btn">Update</button></a>

                        <form method="POST" action="{{ action('ProductController@destroy', $product->id) }}" >
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input class="del-btn" type="submit" value="Delete">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <a href="{{ action('ProductController@create') }}"><button class="add-prod-btn">Add New Product</button></a>

    <section class="todayOrder">
        <h2>Current Orders</h2>
        <p>These are the orders that are due to be picked up today!</p>
        <div class="order-heading">
                <span class="heading"> Order Id</span>
                <span class="heading"> Customer</span>
                <span class="heading"> Pickup Date</span>
                <span class="heading"> Total</span>
        </div>
        <div class="order-list">
            @foreach($orders as $order)
                <div class="order">
                    <span class="order-item"> {{$order->id}} </span>
                    <span class="order-item"> {{$order->user->name}}</span>
                    <span class="order-item"> {{$order->pickup_date}}</span>
                    <span class="order-item"> {{$order->price}}</span>

                    <div class="order-btn">
                        <form method="post" action="{{ action('AdminController@pickedUp', $order->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input class="pickUp-btn" type="submit" value="Picked Up">
                        </form>

                        <a href="{{ action('OrderController@show', $order->id) }}"><button class="view-order-btn">View Order</button></a>

                        <form method="POST" action="{{ action('OrderController@destroy', $order->id) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input class="del-btn" type="submit" value="Delete">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
