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
            <strong>{{$product->name}}</strong><br>
            &dollar;{{$product->price}} per 10lb. box<br>
            Product Description: {{$product->description}}<br>
        {{--    Product Quantity: {{$product->quantity}}<br>--}}


            <form method="POST" action="{{ action('CartController@store') }}">
                {{ csrf_field() }}

                <input type="hidden" name="product_id" value="{{$product->id}}">

                <label for="quantity">Number of Boxes </label>
                <input name="quantity" type="number" min="1" max="10" value="1" required="required"> <br>

                <label for="size">Number of pieces for <strong>each box</strong> </label>
                <input name="size" type="number" min="1" max="5" value="1" required="required"> <br>

                <input type="submit" value="Add To Cart">
            </form>
        </div>
    </div>
@endsection
