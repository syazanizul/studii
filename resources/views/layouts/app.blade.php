<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    Meta--}}
    {!! SEOMeta::generate(true) !!}

{{--    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('images/cat.png')}}">--}}
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('images/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('images/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('images/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('images/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('images/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('images/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('images/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">

{{--    For whatsapp--}}
    <meta property="og:image" content="{{asset('images/favicon/android-icon-192x192.png')}}"/>
    <meta property="og:title" content="Studii - Study Add Math for Free"/>
    <meta property="og:description" content="Practice exercise questions for free | SPM , PT3, UPSR |"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">

    <!--Intro.js-->
    <link href="{{asset('css/introjs/introjs.css')}}" rel="stylesheet" />

    {{--    ADSENSE --}}
    <script data-ad-client="ca-pub-7446857168486939" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    {{--    END ADSENSE --}}

    @yield('link-in-head')

    <style>
        @yield('style')



    </style>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118039009-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-118039009-2');
    </script>


</head>

<body>
    <div id="app">
        <nav class="app-main-nav navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand app-logo" href="{{ url('/') }}">
                    Stud<span class="app-color-green">ii</span>
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

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
{{--                                <a class="dropdown-item" href="/about/teacher/join-us">About Studii</a>--}}
{{--                                <div class="dropdown-divider"></div>--}}
                                <a class="dropdown-item" href="/about/teacher/join-us">Studii For Teachers</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/about/for-company">Studii For Companies</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/about/teacher/compensation-for-contributors">Compensation for Contributors</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact Us</a>
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
                        @else

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="text-capitalize">{{ ucwords(strtolower(Auth::user()->firstname)) }}</span> <span class="caret"></span>
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
                                        @case(5)
                                        <a class="dropdown-item" href="/admin">Dashboard</a>
                                        @break
                                    @endswitch
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="pt-4">
            @yield('content')
        </main>

        <main>
            <section class="app-section-footer">
                <div class="container p-0">
                    <div class="pt-5 pb-2 px-4 row">
                        <div class="col-lg-4 my-3">
                            <h4>Why Studii exists?</h4>
                            <p>The only goal is to make exercise questions abundant & free for students. Literally that's it. </p>
                        </div>
                        <div id="app-div-right" class="col-lg-3 my-3">
                            <h4>Easy Navigate</h4>
                            <ul id="app-footer-links">
                                <a href="/"><li>Practice</li></a>
                                <a href="/about/teacher/join-us"><li>Join us as a Teacher</li></a>
                                <a href="/about/teacher/compensation-for-contributors"><li>Compensation for Contributors</li></a>
                                <a href="/contact"><li>Contact Us</li></a>
                                <a href="/disclaimer"><li>Disclaimer</li></a>
{{--                                @guest--}}
{{--                                    <a href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                @endguest--}}
                            </ul>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-md-4 my-3">
                            <h4>Subscribe to our newsletter</h4>
                            <form action="/mail/newsletter">
                                <div class="row">
                                    <div class="m-1 d-inline-block w-50">
                                        <input type="email" name="email" class="form-control" placeholder="your email" onkeyup="document.getElementById('btn-newsletter').disabled = false">
                                    </div>
                                    <div class="m-1 d-inline-block w-25 float-right">
                                        <input id="btn-newsletter" type="submit" value="subscribe" class="btn btn-primary w-100" disabled>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="py-2 px-4 pb-5 row">
                        <div class="col-lg-3 my-3">
                            <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fwww.facebook.com%2Fstudii.malaysia%2F&layout=button_count&size=large&width=102&height=28&appId"
                                    width="102" height="28" id="app-facebook" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                        </div>
                        <div class="col-lg-4">
                            <h5>Studii is the work of some university students who work on it in our free time. <br>Please give us some time to grow this platform.</h5>
                            <hr>
                        </div>
                        <div class="col-lg-5 text-right">
                            <h5>Do note that we will have our own <span class="font-weight-bold">mobile app</span> later on, that will allow you to practice
                                exercise questions easier. Stay tuned.</h5>
                        </div>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/intro.min.js"></script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        @yield('script')
    </script>

</body>
</html>
