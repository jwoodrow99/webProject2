@extends('layouts.app')

@section('content')

    @if(!$currentUser)
        Current User: NONE!
    @else
        Current User: {{$currentUser->email}}
    @endif

    <br><br>

    All Users:
    <ol>

        @foreach($allUsers as $user)
            <li>
                User Id: {{ $user->id }}<br>
                Name: {{ $user->name }}<br>
                Email: {{ $user->email }}<br><br>

                @foreach( $user->roles as $role)
                    Role: {{ $role->name }}<br><br>
                @endforeach

                @if($user->customer)
                    Customer INFO: <br>
                    Customer Id: {{ $user->customer->id }}<br>
                    User Id: {{ $user->customer->user_id }}<br>
                    Name: {{ $user->customer->name }}<br>
                    Address: {{ $user->customer->address }}<br>
                    City: {{ $user->customer->city }}<br>
                    Province: {{ $user->customer->province }}<br>
                    Postal: {{ $user->customer->postal }}<br>
                    Phone: {{ $user->customer->phone }}<br>
                @endif

                Orders:
                <ol>
                    @foreach($user->orders as $order)
                        <li>
                            Order Id: {{ $order->id }}<br>
                            User Id: {{ $order->user_id }}<br>
                            Price: {{ $order->price }}<br>
                            Paid: {{ $order->paid }}<br>
                            Pickup: {{ $order->pickup_date }}<br>
                            Products:

                            <ol>
                                @foreach($order->products as $product)
                                    <li>
                                        Product Id: {{ $product->id }}<br>
                                        Product Code: {{ $product->product_code }}<br>
                                        Name: {{ $product->name }}<br>
                                        Description: {{ $product->description }}<br>
                                        Quantity: {{ $product->quantity }}<br>
                                        Price: {{ $product->price }}<br>
                                    </li>
                                @endforeach
                            </ol>

                        </li>
                        <br>
                    @endforeach
                </ol>

            </li>
            <br>
        @endforeach

    </ol>

@endsection
