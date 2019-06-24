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
<body class="@guest{{"guest"}}@endguest">
    <div id="app" class="h-100">
        <nav class="navbar navbar-expand-md navbar-dark bg-secondary mb-4">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand wvfsbos d-md-none" href="{{ route('home') }}">WillametteValley<span class="font-weight-bolder">FSBOs</span>.com</a>
                {{-- Collapsed on mobile: --}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- Left Side Of Navbar --}}
                    <ul class="navbar-nav mr-auto">
                        {{-- <li class="nav-item mr-3"><a class="nav-link" href="{{ route('agent.dashboard') }}">{{ __('Dashboard') }}</a></li> --}}
                        <li class="nav-item"><a class="nav-link" href="{{ route('agent.leads.index') }}">{{ __('My Leads') }}</a></li>
                        <li class="nav-item mr-3"><a class="nav-link" href="{{ route('agent.listings.index') }}">{{ __('My FSBOs') }}</a></li>
                    </ul>

                    {{-- Right Side Of Navbar --}}
                    <ul class="navbar-nav ml-auto">
                        {{-- Authentication Links --}}
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('agent.login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('agent.register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('agent.register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('agent.logout') }}">{{ __('Logout') }}</a>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div> {{-- Collapsed on mobile --}}
            </div>
        </nav>

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
        <footer class="font-small text-muted">

            {{-- Copyright --}}
            <div class="footer-copyright text-center">&copy; {{ date('Y') }}
                <a class="" href="https://www.eugenerealtygroup.com/" target="_blank"> Eugene Realty Group LLC</a>
                <span>&#8226;</span>
                Made with <span style="font-size: .8em">❤️</span> by <a href="mailto:dustin@eugenerealtygroup.com" target="_blank">Dustin</a>. v0.1
            </div>{{-- /Copyright --}}
        </footer>
        {{-- Footer --}}
    </div>
</body>
</html>
