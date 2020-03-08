@extends('layouts.app')

@section('content')

{{--    {{$user->name}}--}}

{{--    <br><br>--}}

{{--    @foreach($user->orders as $order)--}}
{{--        {{$order->id}}--}}
{{--    @endforeach--}}

    {{$currentUser->customer}}

@endsection
