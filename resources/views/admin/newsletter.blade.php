@extends('layouts.admin')
<link href="{{ asset('css/admin/admin.newsletter.css') }}" rel="stylesheet">
@section('content2')
    <h2>Newsletter</h2>
    <div class="news-container">
        <form method="post" action="{{ action('AdminController@sendLetter') }}" enctype="multipart/form-data" id="emailform">

            {{ csrf_field() }}

            <label for="subject">Subject: </label><br/>
            <input name="subject" type="text" required><br>

        </form>
        <label for="message">Message:</label><br/>
        <textarea rows="4" cols="50" name="message" form="emailform"></textarea><br/>

        <input type="button" value="Send Mail" onclick="event.preventDefault();document.getElementById('emailform').submit();">
    </div>
@endsection
