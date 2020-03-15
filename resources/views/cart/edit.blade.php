@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cart</div>
                    <div class="card-body">

                        <form method="post" action="{{ action('CartController@update', $cart->id) }}" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}


                            <label for="quantity">Quantity: </label>
                            <input name="quantity" type="text" value="{{$cart->quantity}}"><br>

                            <input type="submit" value="Submit!">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
