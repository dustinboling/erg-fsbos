<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- Left Side Of Navbar --}}
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('homes.index') }}">{{ __('Search') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">{{ __('About') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('services') }}">{{ __('Services') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">{{ __('Contact') }}</a></li>
                    </ul>

                    {{-- Right Side Of Navbar --}}
                    <ul class="navbar-nav ml-auto">
                        {{-- Authentication Links --}}
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li> --}}
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel d-print">
            <div class="container">
                <div class="navbar-nav navbar-brand mr-auto"><a class="nav-link" style="color:#26A7DE" href="/">WillametteValley<span style="font-weight:900;color:#43C143">FSBOs</span>.com</a></div>
                <div class="navbar-nav navbar-brand ml-auto"><a class="nav-link" href="https://www.eugenerealtygroup.com/"><img src="https://t.realgeeks.media/thumbnail/SPS72pEcMcY_7kEInO_fxKeu9tw=/fit-in/200x43/filters:format(png)/https://u.realgeeks.media/eugenerealtygroup/EugeneRealty-web-logo_licensed.png" alt="Eugene Realty Group"></a></div>
            </div>
        </nav>

        <main class="py-4">
            @if (session('status'))
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    </div>
                </div>
            </div>

            @endif
            @yield('content')
        </main>

        <footer>
            <nav class="navbar navbar-dark bg-primary text-white py-3">
                <div class="container">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="#" class="nav-link">&copy; 2019 Eugene Realty Group LLC</a></li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="https://www.eugenerealtygroup.com/" class="nav-link">Presented by Eugene Realty Group</a></li>
                    </ul>
                </div>
            </nav>
        </footer>
    </div>
</body>
</html>
