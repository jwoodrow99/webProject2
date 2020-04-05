@extends('layouts.app')
<link href="{{ asset('css/products/products.index.css') }}" rel="stylesheet">

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
                            {{$product->name}}<br>
                            &#36;{{$product->price}}<br>
                        </li>
                    </div>
                </a>
        @endforeach
    </ol>
@endsection
