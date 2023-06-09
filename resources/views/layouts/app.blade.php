<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    {{-- Link cdn sweet alert --}}
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css" />
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
    </script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
    </script>

    <!-- includes the Braintree JS client SDK -->
    <script src="https://js.braintreegateway.com/web/dropin/1.34.0/js/dropin.min.js"></script>

</head>

<body>
    <div id="app">
        <header class="col-md-9 ms-sm-auto col-lg-10">
            <nav class="navbar my-navbar navbar-expand-md shadow-sm mb-2">
                <div class="container-fluid pl-2 pe-2">
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        {{-- config('app.name', 'Laravel') --}}
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        {{-- <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost:5174/">Homepage</a>
                            </li>
                        </ul> --}}

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{-- Show name if available, else show email --}}
                                        {{ Auth::user()->name ?? Auth::user()->email }}
                                    </a>

                                    <div class="dropdown-menu my_dropdown-menu dropdown-menu-right"
                                        aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>
                                        <a class="dropdown-item"
                                            href="{{ route('user.apartments.index') }}">{{ __('Apartments') }}</a>
                                        <a class="dropdown-item"
                                            href="{{ route('user.messages.index') }}">{{ __('Messages') }}</a>
                                        <a class="dropdown-item" href="http://localhost:5174/">Homepage</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

        </header>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-4">


            <section id="messages" class="">
                @yield('messages')
            </section>
            @yield('content')
        </main>
        @include('layouts.partials.sidebar')
    </div>
    @yield('script')
</body>

</html>
