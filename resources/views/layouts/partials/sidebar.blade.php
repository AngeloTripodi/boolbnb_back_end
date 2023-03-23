<header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column text-white">
                        <div class="my-logo mx-2">
                            <img class="w-100" src="{{ asset('img/Logo.png') }}" alt="boolbnb logo">
                        </div>

                        @guest
                            <li class="nav-item">
                                <a class="nav-link {{ Route::current()->getName() == 'login' ? 'active' : '' }}"
                                    href="{{ route('login') }}">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                    {{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::current()->getName() == 'register' ? 'active' : '' }}"
                                        href="{{ route('register') }}">
                                        <i class="fa-solid fa-user-plus"></i>
                                        {{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">

                            <li class="nav-item">
                                <a class="nav-link {{ Route::current()->getName() == '' ? 'active' : '' }}"
                                    aria-current="page" href="{{ url('/') }}">
                                    <i class="fa-solid my-fa-solid fa-house"></i>
                                    Homepage
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ Route::current()->getName() == 'user.apartments.index' ? 'active' : '' }}"
                                    href="{{ route('user.apartments.index') }}">
                                    <i class="fa-solid fa-building-user"></i>
                                    Apartments
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::current()->getName() == 'messages.index' ? 'active' : '' }}"
                                    href="#">
                                    <i class="fa-solid fa-envelope"></i>
                                    Messages
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::current()->getName() == 'reports.index' ? 'active' : '' }}"
                                    href="#">
                                    <i class="fa-solid fa-chart-simple"></i>
                                    Reports
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ Route::current()->getName() == 'dashboard' ? 'active' : '' }}"
                                    href="{{ url('dashboard') }}">
                                    <i class="fa-solid fa-gauge"></i>
                                    {{ __('Dashboard') }}</a>
                            </li>

                            <hr>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>


            </nav>
        </div>
    </div>
</header>
