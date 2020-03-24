@extends('layouts.app')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

@section('content')

{{--    <ol>--}}
{{--        @foreach($products as $product)--}}
{{--            <a href=" {{ action('ProductController@show', $product->id) }} ">--}}
{{--                <li>--}}
{{--                    @isset($product->image)--}}
{{--                        <img src="{{ asset('storage/' . $product->image) }}"><br>--}}
{{--                    @endisset--}}
{{--                    <br>--}}
{{--                    Name: {{$product->name}}<br>--}}
{{--                    Price: {{$product->price}}<br>--}}
{{--                </li>--}}
{{--            </a>--}}
{{--            @if(Auth::check())--}}
{{--                @if(Auth::user()->hasRole('manager'))--}}
{{--                    <a href="{{ action('ProductController@edit', $product->id) }}">[EDIT]</a>--}}
{{--                @endif--}}
{{--            @endif--}}
{{--            <br><br><br>--}}
{{--        @endforeach--}}
{{--    </ol>--}}
    <div class="banner">
        <img src="{{ URL::asset('/images/bannerImg.jpg') }}" alt="" />
    </div>

{{--    just to have a divisor between banner and content, may have to create and svg for line rules--}}
    <div class="hrRule">
        <span class="hrLeft"></span>
        <div class="shopNow">
           <a href="{{ url('product') }}"><button class="shopNowBtn">Shop Now</button></a>
        </div>
        <span class="hrRight"></span>
    </div>

    <p class="bText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at mollis dolor. Nullam ac nisl tellus. Nunc sagittis ullamcorper laoreet. Aenean vestibulum lorem sit amet urna egestas commodo. Vivamus massa erat, aliquet nec lacinia eget, consequat quis quam. Vivamus sagittis mauris a tellus tempor blandit. Mauris in mattis magna. Duis metus sem, laoreet eget scelerisque nec, sodales eu neque. Aenean rutrum aliquet ligula, et porta arcu volutpat eget. Nullam in nisl aliquet, efficitur nisl eu, pulvinar orci. <br/> Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin eros justo, elementum a ex id, imperdiet accumsan orci. Quisque sollicitudin, massa eget molestie dapibus, arcu metus rutrum tellus, id tristique nunc est ut orci. Duis semper sed libero eu accumsan. Phasellus lacinia et dolor non fermentum. Nam sed lacus sit amet enim posuere blandit. Vivamus cursus gravida rhoncus. Nullam nec pellentesque augue. Donec nibh neque, ullamcorper in elit eget, lobortis commodo est. In posuere quis diam dictum faucibus. Nulla facilisi. Etiam luctus aliquam urna, vel aliquam nunc ullamcorper sed.</p>

    <div>
        <figure class="center">
            <img src="{{ URL::asset('/images/bodyImg.jpg') }}" alt="">
            <figcaption>Lorem Ispsum</figcaption>
        </figure>
    </div>

@endsection
