@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (Auth::check())
        You are logged in!
    @else
        You are NOT logged in!
    @endif

@endsection
