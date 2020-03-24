@extends('layouts.app')
<link href="{{ asset('css/products/products.index.css') }}" rel="stylesheet">

@section('content')
    <h1>Products</h1>
    <ol class="grid-container">
        @foreach($products as $product)
            <div class="prod-list">
                <a href=" {{ action('ProductController@show', $product->id) }} ">
                    <li>
                        @isset($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}"><br>
                        @endisset
                        Name: {{$product->name}}<br>
                        Price: {{$product->price}}<br>
                    </li>
                </a>
            </div>
        @endforeach
    </ol>
@endsection
