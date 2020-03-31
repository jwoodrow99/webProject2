@extends('layouts.app')

@section('content')
    <h2>Order Confirmation</h2>
    <h4>Thank you for your purchase! Your order will be ready for pickup on {{ $order->pickup_date }}</h4>

@endsection
