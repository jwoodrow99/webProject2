<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Home') }}</title>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
    <script src="{{ asset('js/layouts/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/app.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/layouts/index.css') }}" rel="stylesheet">--}}

</head>
<body>
<div class="page-container">
    <div class="content-wrapper">
        <nav class="main-nav">
        <!-- Left Side Of Navbar -->
             <ul class="left">
                 <li>
                     <a class="logo" href="{{ url('/') }}">Home</a>
                 </li>
             </ul>
        <!-- Right Side Of Navbar -->
            <ul class="right">
                <li>
                    <a class="current @if(Request::is('Home')) active @endif"   href="{{ url('/') }}">Home</a>
                </li>
                <li>
                    <a  href="{{ url('product') }}">Products</a>
                </li>
                <li>
                    <a class="current" onclick="openMenu(event, 'item')" href="{{url('aboutus')}}">About</a>
                </li>
                <li>
                    <a class="current" onclick="openMenu(event, 'item')" href="{{url('faq')}}">FAQ</a>
                </li>
                <li>
                    <a class="current" onclick="openMenu(event, 'item')" href="{{url('contactus')}}">Contact Us</a>
                </li>

            <!-- Authentication Links -->
                @if(Auth::check())
                    @if(Auth::user()->hasAnyRole(['manager', 'employee']))
                        <li>
                            <a class="" href="{{ url('admin') }}">Admin</a>
                        </li>
                    @endif
                @endif

                @if(Auth::check())
                    <li>
                        <a class="" href="{{ url('cart') }}">Cart</a>
                    </li>
                @endif

                @guest
                    <li>
                        <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @if (Route::has('register'))
                    <li>
                        <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                @else
                    <li class="dropdown-c">
                        <span>
                            {{Auth::user()->name }}
                        </span>
                        <ul class="dropdown-c-content">
                            <li><a class="" href="{{ url('customer') }}">Profile</a></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @endguest
            </ul>
        </nav>
        <nav class="mobile-nav">
            <!-- Left Side Of Navbar -->
            <ul class="left">
                <li>
                    <a class="logo" href="{{ url('/') }}">Home</a>
                </li>
                <li>
                    <button class="hamburger">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="dropdown-mobile">
                <li class="">
                    <a class="currentNavItem" href="{{ url('/') }}">Home</a>
                </li>
                <li>
                    <a class="" href="{{ url('product') }}">Products</a>
                </li>
                <li>
                    <a class="" href="#">About</a>
                </li>
                <li>
                    <a class="" href="#">FAQ</a>
                </li>
                <li>
                    <a class="" href="#">Contact Us</a>
                </li>
                <!-- Authentication Links -->
                @if(Auth::check())
                    @if(Auth::user()->hasAnyRole(['manager', 'employee']))
                        <li>
                            <a class="" href="{{ url('admin') }}">Admin</a>
                        </li>
                    @endif
                @endif

                @if(Auth::check())
                    <li>
                        <a class="" href="{{ url('cart') }}">Cart</a>
                    </li>
                @endif

                @guest
                    <li>
                        <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li><a class="" href="{{ url('customer') }}">Profile</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                        @csrf
                    </form>
                @endguest
            </ul>
        </nav>
        <main>

            @yield('content')

        </main>
    </div>
        <footer class="footer">
            <div>
                <p>Contact Us</p>
                <p>Zaccaginini Meats</p>
                <a href="tel:1111111111">111-111-1111</a>
            </div>
            <div>
                <p>&copy; 2020 - K.A.W.S & Zaccagnini Meats </p>
            </div>
        </footer>
    </div>
    @yield('stripeScripts')
</body>
</html>
