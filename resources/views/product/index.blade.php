@extends('layouts.app')
<link href="{{ asset('css/products/products.index.css') }}" rel="stylesheet">

@section('content')
    <h1 class="title">Products</h1>
    <ol class="grid-container">
        @foreach($products as $product)
            <div class="prod-item">
                <a href=" {{ action('ProductController@show', $product->id) }} ">
                    <li>
                        @isset($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}"><br>
                        @endisset
                        {{$product->name}}<br>
                        &#36;{{$product->price}}<br>
                    </li>
                </a>
            </div>
        @endforeach
    </ol>
@endsection
