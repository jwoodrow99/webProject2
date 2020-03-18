@extends('layouts.app')

@section('content')

    @isset($product->image)
        <img src="{{ asset('storage/' . $product->image) }}"><br>
    @endisset
    Product Id: {{$product->id}}<br>
    Product Code: {{$product->product_code}}<br>
    Product Name: {{$product->name}}<br>
    Product Description: {{$product->description}}<br>
    Product Quantity: {{$product->quantity}}<br>
    Product Price: {{$product->price}}<br>

    <hr>

    <form method="POST" action="{{ action('CartController@store') }}">
        {{ csrf_field() }}

        <input type="hidden" name="product_id" value="{{$product->id}}">

        <label for="size">Size: </label>
        <input name="size" type="text" required> <br>

        <label for="quantity">Quantity: </label>
        <input name="quantity" type="text" required> <br>

        <input type="submit" value="[ADD TO CART]">
    </form>
@endsection
