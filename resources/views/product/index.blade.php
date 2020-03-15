@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Products</div>
                    <div class="card-body">

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
                                <a href="{{ action('ProductController@edit', $product->id) }}">[EDIT]</a>
                                <br>
                            @endforeach
                        </ol>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
