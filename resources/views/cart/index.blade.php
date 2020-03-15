@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cart</div>
                    <div class="card-body">

                        <ul>
                            @foreach($cart as $item)
                                <li>
                                    Product Id: {{$item->id}}<br>
                                    Product Code: {{$item->product->product_code}}<br>
                                    Product Name: {{$item->product->name}}<br>
                                    Product Quantity: {{$item->quantity}}<a href="{{ action('CartController@edit', $item->id) }}">[EDIT]</a><br>
                                    Price: ${{$item->product->price * $item->quantity}}<br>

                                    <form method="POST" action="{{ action('CartController@destroy', $item->id) }}">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <input type="submit" value="[REMOVE FROM CART]">
                                    </form>
                                </li>
                                <br>
                            @endforeach
                        </ul>

                        <hr>

                        <h2>Total Price: ${{$totalPrice}}</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
