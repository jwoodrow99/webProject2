@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Products</div>
                    <div class="card-body">

                        <form method="post" action="{{ action('ProductController@store') }}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <label for="product_code">Code: </label>
                            <input name="product_code" type="text" required><br>

                            <label for="name">Name: </label>
                            <input name="name" type="text" required><br>

                            <label for="description">description: </label>
                            <input name="description" type="text" required><br>

                            <label for="quantity">Quantity: </label>
                            <input name="quantity" type="text" required><br>

                            <label for="price">Price: </label>
                            <input name="price" type="text" required><br>

                            <label for="image">Image: </label>
                            <input name="image" type="file" accept="image/*" required><br>

                            <input type="submit" value="Create!">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
