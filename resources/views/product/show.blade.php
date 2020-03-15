@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Products</div>
                    <div class="card-body">

                        <img src="{{ $product->image }}" alt=""><br>
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

                            <label for="quantity">Quantity: </label>
                            <input name="quantity" type="text" required>

                            <input type="submit" value="[ADD TO CART]">
                        </form>

                        <a href="{{ action('ProductController@edit', $product->id) }}">[EDIT]</a>

                        <form method="POST" action="{{ action('ProductController@destroy', $product->id) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="submit" value="[DELETE]">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
