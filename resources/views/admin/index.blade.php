@extends('layouts.admin')

@section('content2')
    <section class="products">
        <h3>Products</h3>
        <a href="{{ action('ProductController@create') }}">NEW PRODUCT</a>
        <table>
            <tr>
                <th>Name</th>
                <th>Product Code</th>
                <th>Stock</th>
                <th>Update stock</th>
                <th></th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->product_code}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>
                        <form method="post" action="{{ action('AdminController@addStock', $product->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input type="submit" value="+">
                        </form>
                        <form method="post" action="{{ action('AdminController@removeStock', $product->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input type="submit" value="-">
                        </form>
                    </td>
                    <td>
                        <a href="{{ action('ProductController@edit', $product->id) }}">[UPDATE]</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>

    <section class="todayOrder">
        <h3>Todays Orders</h3>
        <p>These are the orders that are due to be picked up today!</p>
        <table>
            <tr>
                <th>Order Id</th>
                <th>Customer</th>
                <th>Pickup Date</th>
                <th>Total</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->pickup_date}}</td>
                    <td>{{$order->price}}</td>
                    <td>
                        <form method="post" action="{{ action('AdminController@pickedUp', $order->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input type="submit" value="Picked Up">
                        </form>
                    </td>
                    <td>
                        <a href="{{ action('OrderController@show', $order->id) }}">VIEW ORDER</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ action('OrderController@destroy', $order->id) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="submit" value="DELETE">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
@endsection
