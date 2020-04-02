@extends('layouts.app')
<link href="{{ asset('css/contactus/contactus.css') }}" rel="stylesheet">
@section('content')
    <h1>Contact Us</h1>
    <p>
        Questions or comments<br/>
        Email us below or visit our storefront!
    </p>
    <form action="mailto:someone@example.com" method="post" enctype="text/plain">
        <label for="email"> Email </label>
        <input type="email" name="email"> <br/>

        <label for="subject"> Subject</label>
        <input type="text" name="subject"><br/>

        <label for="message"> Message </label> <br/>
        <textarea name="message"></textarea> <br/>

        <input type="submit" value="Send">
    </form>

    Hours:
    <ol>
        <li>Monday:</li>
        <li>Tuesday:</li>
        <li>Wednesday:</li>
        <li>Thursday:</li>
        <li>Friday:</li>
        <li>Saturday:</li>
        <li>Sunday:</li>
    </ol>

    <div class="gmap_canvas">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2950.3897053506835!2d-83.00523508430494!3d42.31288607919011!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x883b2c90a536b833%3A0xffe20b39b058a688!2sWindsor%20Market%20Square!5e0!3m2!1sen!2sus!4v1585794909140!5m2!1sen!2sus"
                width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
        </iframe>
    </div>
@endsection

