
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

    <form method="POST" action="{{ action('CustomerController@destroy', $customer->id) }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <input type="submit" value="[DELETE]">
    </form>

@endsection
