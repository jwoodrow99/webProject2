@extends('layouts.app')
<link href="{{ asset('css/products/product.index.css') }}" rel="stylesheet">

@section('content')
    <h1 class="title">Products</h1>
    <ol class="grid-container">
        @foreach($products as $product)
                <a class="prod-item" href=" {{ action('ProductController@show', $product->id) }} ">
                    <div class="">
                        <li>
                            @isset($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}"><br>
                            @endisset
                            <span class="prod-name">{{$product->name}}</span><br>
                            <span class="prod-price">&dollar;{{$product->price}}</span><br>
                            @if($product->quantity == 0)
                                <span class="prod-price" style="color: red">Sold Out</span><br>
                            @endif
                        </li>
                    </div>
                </a>
        @endforeach
    </ol>
@endsection
