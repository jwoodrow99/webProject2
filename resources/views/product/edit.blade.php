@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Products</div>
                    <div class="card-body">

                        <form method="post" action="{{ action('ProductController@update', $product->id) }}" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <label for="product_code">Code: </label>
                            <input name="product_code" type="text" value="{{$product->product_code}}"><br>

                            <label for="name">Name: </label>
                            <input name="name" type="text" value="{{$product->name}}"><br>

                            <label for="description">description: </label>
                            <input name="description" type="text" value="{{$product->description}}"><br>

                            <label for="quantity">Quantity: </label>
                            <input name="quantity" type="text" value="{{$product->quantity}}"><br>

                            <label for="price">Price: </label>
                            <input name="price" type="text" value="{{$product->price}}"><br>

                            <label for="image">Image: </label>
                            <input name="image" type="file" accept="image/*"><br>

                            <input type="submit" value="Submit!">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
