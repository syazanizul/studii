<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Studii</title>
    <link rel="icon" type="image/png" sizes="96x96" href="images/cat.png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--Intro.js-->
    <link href="{{asset('css/introjs/introjs.css')}}" rel="stylesheet" />

    @yield('link-in-head')

    <style>
        @import url('https://fonts.googleapis.com/css?family=Dosis&display=swap');
        @import url('https://fonts.googleapis.com/css?family=Quicksand:400,500,700&display=swap');

        @yield('style')

        .logo {
            font-family:'dosis', sans-serif;
            font-weight: bold;
            font-size:2.0em;
        }

        .main-nav {
            border-top:5px solid #29ca8e;
            background-color: #edf1f7;
        }

        .navbar-nav li   {
            padding-left: 1em;
            padding-right: 1em;
            font-size:1.1em;
        }

        /*Footer*/

        .section-footer {
            background-color: #6E6A6F;
            min-height:10em;
        }

        .section-footer div div {
            padding:15px;
            padding-top:2em;
            color:white;
            font-family:'Quicksand', sans-serif;
        }

        .section-footer div div h4 {
            font-weight:bold;
        }

        #footer-links a  {
            color:white;
        }

        #div-right  {
            text-align:right;
        }

        @media only screen and (max-width: 780px) {
            #div-right  {
                text-align:left;
            }
        }

    </style>
</head>

<body>
    <div id="app">
        <nav class="main-nav navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand logo" href="{{ url('/') }}">
                    Stud<span style="color:green">ii</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="/">Practice</a>
                        </li>

{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="/about">About</a>--}}
{{--                        </li>--}}

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                            </li>
                            @if (Route::has('register'))
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
                            @endif
                        @else

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span style="text-transform: capitalize">{{ Auth::user()->name }}</span> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @switch(Auth::user()->role)
                                        @case(1)
                                            <a class="dropdown-item" href="/student">Dashboard</a>
                                            @break
                                        @case(2)
                                            <a class="dropdown-item" href="/teacher">Dashboard</a>
                                            @break
                                        @case(3)
                                            <a class="dropdown-item" href="/parent">Dashboard</a>
                                            @break
                                        @case(4)
                                            <a class="dropdown-item" href="/volunteer">Dashboard</a>
                                            @break
                                    @endswitch
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <main>
            <section class="section-footer">
                <div class="container" style="padding:0;">
                    <div class="row">
                        <div class="col-sm-4">
                            <h4>The Principle</h4>
                            <p>Always remember you're unique, just like everyone else.</p>
                        </div>
                        <div id="div-right" class="col-sm-4">
                            <h4>Easy Navigate</h4>
                            <ul id="footer-links" style="list-style: none; padding-left: 0; color:white;">
                                <a href="/"><li>Practice</li></a>
{{--                                @guest--}}
{{--                                    <a href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                @endguest--}}
                            </ul>
                        </div>
{{--                        <div class="col-sm-4">--}}
{{--                            <h5><span style="font-weight: bold">Pictocat</span> - coolest website you can possibly browse EVER</h5>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </section>
        </main>

    </div>

    @yield('modal')

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <!--Intro.js-->
    <script type="text/javascript" src="{{asset('js/introjs/intro.js')}}"></script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        @yield('script')
    </script>

</body>
</html>
