<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Partner Dashboard') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar top-navbar">
            <div class="container">
                <div class="navbar-left">
                    <div class="navbar-btn">
                        <a class="logo" href="{{ url('/') }}">
                            <img src="/img/humbl-black.png" class="navbar-logo" alt="">
                        </a>
                    </div>
                </div>

                <div class="navbar-right">
                    <div id="navbar-menu">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="/login">Sign In</a>
                                <a href="/register">Sign Up</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="progress-container"><div class="progress-bar" id="myBar"></div></div>
        </nav>

        <main class="py-4 login">
            @yield('content')
        </main>
    </div>
</body>
</html>
