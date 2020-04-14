@extends('layouts.app')
<link href="{{ asset('css/products/product.show.css') }}" rel="stylesheet">

@section('content')
    <div class="prod-container">
        <div class="prod-img">
            @isset($product->image)
                <img src="{{ asset('storage/' . $product->image) }}"><br>
            @endisset
        </div>
        <div class="form-info prod-info">
        {{--    Product Id: {{$product->id}}<br>--}}
        {{--    Product Code: {{$product->product_code}}<br>--}}
            <span class="prod-name">{{$product->name}}</span><br>
            <span class="prod-price">&dollar;{{$product->price}}</span> per 10lb. box<br>
            Product Description: {{$product->description}}<br>
        {{--    Product Quantity: {{$product->quantity}}<br>--}}


            <form method="POST" action="{{ action('CartController@store') }}">
                {{ csrf_field() }}

                <input type="hidden" name="product_id" value="{{$product->id}}">

                <label for="quantity">Number of Boxes </label>
                <input name="quantity" type="number" min="1" max="90" value="1" required="required"> <br>

                <label for="size">Number of pieces for <strong>each box</strong> </label>
                <input name="size" type="number" min="10" max="40" value="20" required="required"> <br>

                <input class="add-to-cart" type="submit" value="Add To Cart">
            </form>
        </div>
    </div>
@endsection
