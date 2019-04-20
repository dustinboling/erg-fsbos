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
    <div id="app" class="h-100">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand wvfsbos d-md-none" href="{{ route('home') }}">WillametteValley<span class="font-weight-bolder">FSBOs</span>.com</a>
                {{-- Collapsed on mobile: --}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- Left Side Of Navbar --}}
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item mr-3"><a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        <li class="nav-item mr-3"><a class="nav-link" href="{{ route('cities.index') }}">{{ __('Browse') }}</a></li>
                        <li class="nav-item mr-3"><a class="nav-link" href="{{ route('listings.index') }}">{{ __('Search') }}</a></li>
                        <li class="nav-item mr-3"><a class="nav-link" href="{{ route('buyers') }}">{{ __('Buy') }}</a></li>
                        <li class="nav-item mr-3"><a class="nav-link" href="{{ route('sellers') }}">{{ __('Sell') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">{{ __('Contact') }}</a></li>
                    </ul>

                    {{-- Right Side Of Navbar --}}
                    <ul class="navbar-nav ml-auto">
                        {{-- Authentication Links --}}
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="tel:5417996622">(541) 799-6622</a>
                            {{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
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
                                <a href="{{ route('nova.login') }}" class="dropdown-item">{{ __('Dashboard') }}</a>
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
        <div id="branding" class="shadow-sm bg-white mb-4">
            <div class="container">
                <div class="row py-4">
                    <div id="wvfsbos" class="col-7 d-none d-md-block" style="line-height: 1.2;">
                        <p class="wvfsbos-logo text-secondary mb-0" href="{{ route('home') }}">WillametteValley<span class="font-weight-bolder text-primary">FSBOs</span>.com</p>
                        <p class="mb-0 text-muted"><em>The Most Complete Collection of Homes For Sale by Owner in the Willamette Valley</em></p>
                    </div>
                    <div class="col ml-auto" style="line-height: 1.2;">
                        <div class="card sponsor text-center">
                            <div class="card-body">
                                <a class="d-block float-left mt-2" href="https://www.eugenerealtygroup.com/" target="_blank"><img src="{{ asset('img/eugene-realty-logo.png') }}" alt="Eugene Realty Group" width="116px" height="50px"></a>
                                <p class="card-text text-muted"><em>This free marketing service is provided by <a href="https://www.eugenerealtygroup.com/" target="_blank">Eugene Realty Group</a>, a full-service real estate brokerage licensed in Oregon.</em></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main style="min-height:500px">
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

            @if ($errors->any())
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="page-footer font-small text-light bg-primary pt-4">

            {{-- City Links --}}
            <div class="pt-4" style="background-color:#00000010">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-md-0 mb-3">
                            <h5 class="text-light">Browse Cities</h5>
                            @isset($cityNavItems)
                            <ul class="list-unstyled d-flex flex-wrap">
                                @foreach ($cityNavItems as $cityNavItem)
                                <li class="col-sm-6 col-lg-4 col-xl-3 my-1">
                                    <a class="text-light" href="{{ route('cities.show', $cityNavItem->slug) }}">For Sale by Owner {{ $cityNavItem->name }} OR</a>
                                </li>
                                @endforeach
                            </ul>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
            {{-- Copyright --}}
            <div class="footer-copyright text-center py-3 shadow-sm" style="background-color:#00000020">&copy; {{ date('Y') }}
                <a class="text-light" href="https://www.eugenerealtygroup.com/" target="_blank"> Eugene Realty Group LLC</a>
                <span class="px-1">&middot;</span>
                <a href="tel:5417996622" class="text-light">(541) 799-6622</a>
            </div>{{-- /Copyright --}}
        </footer>
        {{-- Footer --}}
    </div>
</body>
</html>
