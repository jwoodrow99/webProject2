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
    <script src="{{ asset('js/layout/app.js') }}" defer></script>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/app.css') }}" rel="stylesheet">
</head>
<body>
        <nav>
        <!-- Left Side Of Navbar -->
             <ul class="left">
                 <li>
                     <a class="logo" href="{{ url('/') }}">Home</a>
                 </li>
             </ul>

        <!-- Right Side Of Navbar -->
            <ul class="right">
                <li class="">
                    <a class="currentNavItem" href="#">Home</a>
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
        <main class="">

            @yield('content')

        </main>
        <footer>
            Contact Us <br>
            Zaccaginini Meats <br>
            111-111-1111
        </footer>
</body>
</html>
