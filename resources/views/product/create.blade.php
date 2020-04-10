@extends('layouts.app')
<link href="{{ asset('css/products/product.create.css') }}" rel="stylesheet">
@section('content')
    <h1>Add new product</h1>
    <div class="add-prod-container">

        <form method="post" action="{{ action('ProductController@store') }}" enctype="multipart/form-data">

            {{ csrf_field() }}
            <div class="add-prod-fields">
                <span>
                    <label for="product_code">Product Code: </label><br/>
                    <label for="name">Product Name: </label><br/>
                    <label for="description">Product Description: </label><br/>
                    <label for="quantity">Product Quantity: </label><br/>
                    <label for="price">Product Price: </label><br/>
                    <label for="image">Product Image: </label><br/>
                </span>
                <span>
                    <input name="product_code" type="text" required><br>
                    <input name="name" type="text" required><br>
                    <input name="description" type="text" required><br>
                    <input name="quantity" type="text" required><br>
                    <input name="price" type="text" required><br>
                    <input name="image" type="file" accept="image/*" required><br>
                    <input type="submit" value="Create!">
                </span>
            </div>
        </form>
    </div>
@endsection
