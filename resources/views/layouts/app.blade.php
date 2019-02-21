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
                <a class="navbar-brand wvfsbos" href="{{ route('home') }}">WillametteValley<span class="font-weight-bolder">FSBOs</span>.com</a>
                {{-- Collapsed on mobile: --}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- Left Side Of Navbar --}}
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item mr-3"><a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        <li class="nav-item mr-3"><a class="nav-link" href="{{ route('homes.index') }}">{{ __('Buy') }}</a></li>
                        <li class="nav-item mr-3"><a class="nav-link" href="{{ route('services') }}">{{ __('Sell') }}</a></li>
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
                    <div id="wvfsbos" class="col-7" style="line-height: 1.2;">
                        <p class="wvfsbos-logo text-secondary mb-0" href="{{ route('home') }}">WillametteValley<span class="font-weight-bolder text-primary">FSBOs</span>.com</p>
                        <p class="mb-0 text-muted"><em>The Most Complete Collection of Homes For Sale by Owner in the Willamette Valley</em></p>
                    </div>
                    <div class="col ml-auto" style="line-height: 1.2;">
                        <div class="card sponsor text-center">
                            <div class="card-body">
                                <a class="d-block float-left mt-2" href="https://www.eugenerealtygroup.com/" target="_blank"><img src="{{ asset('img/eugene-realty-logo.png') }}" alt="Eugene Realty Group" width="116px" height="50px"></a>
                                <p class="card-text"><em>This free public listing service is sponsored by <a href="https://www.eugenerealtygroup.com/" target="_blank">Eugene Realty Group</a>, a full-service real estate brokerage licensed in Oregon.</em></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main style="min-height:600px">
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

        <!-- Footer -->
<footer class="page-footer font-small blue pt-4">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

          <!-- Grid row -->
          <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

              <!-- Content -->
              <h5>Free Services to FSBO Sellers</h5>
              <p>Advantages for sellers include FREE exposure through our website to reach thousands of buyers every month, a licensed real estate broker’s help with finding buyers for your home without a fee, and help answering all of the inquiries about your home which can save you a lot of time.</p>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5>Browse Cities</h5>

                <ul class="list-unstyled">
                  <li>
                    <a href="#!">Eugene</a>
                  </li>
                  <li>
                    <a href="#!">Springfield</a>
                  </li>
                  <li>
                    <a href="#!">Junction City</a>
                  </li>
                  <li>
                    <a href="#!">Brownsville</a>
                  </li>
                </ul>

              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5>Communities</h5>

                <ul class="list-unstyled">
                  <li>
                    <a href="#!">Santa Clara</a>
                  </li>
                  <li>
                    <a href="#!">Amazon</a>
                  </li>
                  <li>
                    <a href="#!">College Hill</a>
                  </li>
                  <li>
                    <a href="#!">Crest Drive</a>
                  </li>
                </ul>

              </div>
              <!-- Grid column -->

          </div>
          <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">&copy; {{ date('Y') }} Copyright
          <a href="https://www.eugenerealtygroup.com/" target="_blank"> Eugene Realty Group LLC</a>
        </div>
        <!-- Copyright -->

      </footer>
      <!-- Footer -->
    </div>
</body>
</html>
