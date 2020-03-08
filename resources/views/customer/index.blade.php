

@extends('layouts.app')

@section('content')

    <ol>
        @foreach($allCustomers as $customer)
            <li>
                Customer Id: {{ $customer->id }} <br>
                User Id: {{ $customer->user_id }} <br>
                Name: {{ $customer->name }} <br>
                Address: {{ $customer->address }} <br>
                City: {{ $customer->city }} <br>
                Province: {{ $customer->province }} <br>
                Postal: {{ $customer->postal }} <br>
                Phone: {{ $customer->phone }} <br>
                <br>
            </li>
        @endforeach
    </ol>

@endsection
