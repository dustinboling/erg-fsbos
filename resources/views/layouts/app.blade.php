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
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand wvfsbos" href="{{ route('home') }}">WillametteValley<span class="font-weight-bolder">FSBOs</span>.com</a>
                {{-- Collapsed on mobile: --}}
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
                </div> {{-- Collapsed on mobile --}}
            </div>
        </nav>
        <div id="branding" class="shadow-sm bg-white">
            <div class="container">
                <div class="row py-4">
                    <div id="wvfsbos" class="col-6-sm" style="line-height: 1.2;">
                        <p class="wvfsbos-logo text-secondary mb-0" href="{{ route('home') }}">WillametteValley<span class="font-weight-bolder text-primary">FSBOs</span>.com</p>
                        <p class="mb-0 text-muted"><em>The Most Complete Collection of Homes For Sale by Owner in the Willamette Valley</em></p>
                    </div>
                    <div class="col col-5-sm ml-auto" style="line-height: 1.2;">
                        <div class="card sponsor text-center">
                            <div class="card-body">
                                <a class="d-block float-left mt-2" href="https://www.eugenerealtygroup.com/" target="_blank"><img src="{{ asset('eugene-realty-logo.png') }}" alt="Eugene Realty Group"></a>
                                <p class="card-text"><em>This free public listing service is sponsored by <a href="https://www.eugenerealtygroup.com/" target="_blank">Eugene Realty Group</a>, a full-service real estate brokerage licensed in Oregon.</em></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






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
