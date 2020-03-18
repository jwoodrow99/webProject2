@extends('layouts.app')

@section('content')

    <ol>
        @foreach($products as $product)
            <a href=" {{ action('ProductController@show', $product->id) }} ">
                <li>
                    @isset($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}"><br>
                    @endisset
                    Name: {{$product->name}}<br>
                    Price: {{$product->price}}<br>
                </li>
            </a>
            <br><br>
        @endforeach
    </ol>
@endsection
