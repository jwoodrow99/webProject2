@extends('layouts.app')

@section('content')


    <h2>Total Price: ${{$currentUser}}</h2>

    <a href="{{ action('OrderController@store') }}">[CHECKOUT]</a>
@endsection
