
@extends('layouts.app')

@section('content')

    User Id: {{ $customer->user_id  }} <br>
    Name: {{ $customer->name  }} <br>
    Address: {{ $customer->address  }} <br>
    City: {{ $customer->city  }} <br>
    Province: {{ $customer->province  }} <br>
    Postal: {{ $customer->postal  }} <br>
    Phone: {{ $customer->phone  }} <br>

    <a href="{{ action('CustomerController@edit', $customer->id) }}">[EDIT]</a>

    @if(!Auth::user()->hasRole('manager'))
        <a href="{{ action('OrderController@index', $customer->id) }}">[VIEW ORDERS]</a>
    @endif

@endsection
