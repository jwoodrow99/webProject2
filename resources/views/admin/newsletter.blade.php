@extends('layouts.admin')

@section('content2')
    <form method="post" action="{{ action('AdminController@sendLetter') }}" enctype="multipart/form-data" id="emailform">

        {{ csrf_field() }}

        <label for="subject">Subject: </label>
        <input name="subject" type="text" required><br>

    </form>

    <textarea rows="4" cols="50" name="message" form="emailform"></textarea>

    <input type="button" value="Send!" onclick="event.preventDefault();document.getElementById('emailform').submit();">
@endsection
