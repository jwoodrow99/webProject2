@extends('layouts.app')
<link href="{{ asset('css/faq/faq.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{URL::asset('js/faq/faq.js')}} defer"></script> <!--Not sure why link isn't pulling from public/js folder -->
@section('content')
    <h1>Frequently Asked Questions</h1>
    <div class="faq-container">
        <h3>Lorem Ipsum</h3>
        <button class="accordion">Lorem ipsum dolor sit amet?</button>
        <div class="panel">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas molestie maximus nulla, ac faucibus lectus semper eu. Aliquam magna tellus, dapibus sit amet elit quis, condimentum porta diam. Vivamus sit amet mi posuere, congue dolor in, vulputate mauris. Curabitur diam elit, scelerisque sit amet leo vulputate, pretium bibendum turpis. Donec rutrum nisl nec leo efficitur, id pharetra augue rutrum. Aliquam fringilla, ex gravida venenatis blandit, dui metus mollis purus, vitae cursus erat dui at ex. Quisque vitae condimentum eros, vehicula hendrerit sem. Nulla facilisi. In nisl neque, bibendum nec turpis nec, dignissim sodales lectus. Integer turpis neque, auctor nec mi vehicula, gravida aliquam est. Aenean id nisl viverra, mattis lectus non, ultricies lorem. Proin in lorem at dui rhoncus faucibus rhoncus eu orci. Donec sollicitudin ante ut orci tempor pretium.
            </p>
        </div>
        <button class="accordion">Lorem ipsum dolor sit amet?</button>
        <div class="panel">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas molestie maximus nulla, ac faucibus lectus semper eu. Aliquam magna tellus, dapibus sit amet elit quis, condimentum porta diam. Vivamus sit amet mi posuere, congue dolor in, vulputate mauris. Curabitur diam elit, scelerisque sit amet leo vulputate, pretium bibendum turpis. Donec rutrum nisl nec leo efficitur, id pharetra augue rutrum. Aliquam fringilla, ex gravida venenatis blandit, dui metus mollis purus, vitae cursus erat dui at ex. Quisque vitae condimentum eros, vehicula hendrerit sem. Nulla facilisi. In nisl neque, bibendum nec turpis nec, dignissim sodales lectus. Integer turpis neque, auctor nec mi vehicula, gravida aliquam est. Aenean id nisl viverra, mattis lectus non, ultricies lorem. Proin in lorem at dui rhoncus faucibus rhoncus eu orci. Donec sollicitudin ante ut orci tempor pretium.
            </p>
        </div>
        <h3>Aenean vel convallis velit</h3>
        <button class="accordion">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</button>
        <div class="panel">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas molestie maximus nulla, ac faucibus lectus semper eu. Aliquam magna tellus, dapibus sit amet elit quis, condimentum porta diam. Vivamus sit amet mi posuere, congue dolor in, vulputate mauris. Curabitur diam elit, scelerisque sit amet leo vulputate, pretium bibendum turpis. Donec rutrum nisl nec leo efficitur, id pharetra augue rutrum. Aliquam fringilla, ex gravida venenatis blandit, dui metus mollis purus, vitae cursus erat dui at ex. Quisque vitae condimentum eros, vehicula hendrerit sem. Nulla facilisi. In nisl neque, bibendum nec turpis nec, dignissim sodales lectus. Integer turpis neque, auctor nec mi vehicula, gravida aliquam est. Aenean id nisl viverra, mattis lectus non, ultricies lorem. Proin in lorem at dui rhoncus faucibus rhoncus eu orci. Donec sollicitudin ante ut orci tempor pretium.
            </p>
        </div>
        <button class="accordion">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</button>
        <div class="panel">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas molestie maximus nulla, ac faucibus lectus semper eu. Aliquam magna tellus, dapibus sit amet elit quis, condimentum porta diam. Vivamus sit amet mi posuere, congue dolor in, vulputate mauris. Curabitur diam elit, scelerisque sit amet leo vulputate, pretium bibendum turpis. Donec rutrum nisl nec leo efficitur, id pharetra augue rutrum. Aliquam fringilla, ex gravida venenatis blandit, dui metus mollis purus, vitae cursus erat dui at ex. Quisque vitae condimentum eros, vehicula hendrerit sem. Nulla facilisi. In nisl neque, bibendum nec turpis nec, dignissim sodales lectus. Integer turpis neque, auctor nec mi vehicula, gravida aliquam est. Aenean id nisl viverra, mattis lectus non, ultricies lorem. Proin in lorem at dui rhoncus faucibus rhoncus eu orci. Donec sollicitudin ante ut orci tempor pretium.
            </p>
        </div>
        <h3>Etiam fringilla mauris in purus sollicitudin lacinia</h3>
        <button class="accordion">Integer turpis neque, auctor nec mi vehicula, gravida aliquam est?</button>
        <div class="panel">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas molestie maximus nulla, ac faucibus lectus semper eu. Aliquam magna tellus, dapibus sit amet elit quis, condimentum porta diam. Vivamus sit amet mi posuere, congue dolor in, vulputate mauris. Curabitur diam elit, scelerisque sit amet leo vulputate, pretium bibendum turpis. Donec rutrum nisl nec leo efficitur, id pharetra augue rutrum. Aliquam fringilla, ex gravida venenatis blandit, dui metus mollis purus, vitae cursus erat dui at ex. Quisque vitae condimentum eros, vehicula hendrerit sem. Nulla facilisi. In nisl neque, bibendum nec turpis nec, dignissim sodales lectus. Integer turpis neque, auctor nec mi vehicula, gravida aliquam est. Aenean id nisl viverra, mattis lectus non, ultricies lorem. Proin in lorem at dui rhoncus faucibus rhoncus eu orci. Donec sollicitudin ante ut orci tempor pretium.
            </p>
        </div>
        <button class="accordion">Integer turpis neque, auctor nec mi vehicula, gravida aliquam est?</button>
        <div class="panel">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas molestie maximus nulla, ac faucibus lectus semper eu. Aliquam magna tellus, dapibus sit amet elit quis, condimentum porta diam. Vivamus sit amet mi posuere, congue dolor in, vulputate mauris. Curabitur diam elit, scelerisque sit amet leo vulputate, pretium bibendum turpis. Donec rutrum nisl nec leo efficitur, id pharetra augue rutrum. Aliquam fringilla, ex gravida venenatis blandit, dui metus mollis purus, vitae cursus erat dui at ex. Quisque vitae condimentum eros, vehicula hendrerit sem. Nulla facilisi. In nisl neque, bibendum nec turpis nec, dignissim sodales lectus. Integer turpis neque, auctor nec mi vehicula, gravida aliquam est. Aenean id nisl viverra, mattis lectus non, ultricies lorem. Proin in lorem at dui rhoncus faucibus rhoncus eu orci. Donec sollicitudin ante ut orci tempor pretium.
            </p>
        </div>
        <span class="contact">
            <a href="{{url('contactus')}}">Contact Us</a> for any other inquiries.
        </span>
    </div>
    <script>
    let acc = document.getElementsByClassName("accordion");
    let i;

    for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function(){
    this.classList.toggle("active");
    let panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
    panel.style.maxHeight = null;
    } else {
    panel.style.maxHeight = panel.scrollHeight + "px";
    }
    });
    }
    </script>
@endsection

