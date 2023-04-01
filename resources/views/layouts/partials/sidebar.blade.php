<header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky h-100">
                    <ul class="nav flex-column text-white h-100">
                        <div class="my-logo mx-2 ">
                            <img class="w-100" src="{{ asset('img/Logo.png') }}" alt="boolbnb logo">
                        </div>

                        @guest
                            <li class="nav-item">
                                <a class="nav-link {{ Route::current()->getName() == 'login' ? 'active' : '' }}"
                                    href="{{ route('login') }}">
                                    <i class="fa-solid fa-right-to-bracket fa-fw me-1"></i>
                                    {{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::current()->getName() == 'register' ? 'active' : '' }}"
                                        href="{{ route('register') }}">
                                        <i class="fa-solid fa-user-plus fa-fw me-1"></i>
                                        {{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown pt-4">

                            <li class="fs-6 nav-item top-menu-item">
                                <a class="nav-link {{ Route::current()->getName() == 'dashboard' ? 'active' : '' }}"
                                    href="{{ url('dashboard') }}">
                                    <i class="fa-solid fa-gauge fa-fw me-1"></i>
                                    {{ __('Dashboard') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="fs-6 nav-link {{ Route::current()->getName() == 'user.apartments.index' ? 'active' : '' }}"
                                    href="{{ route('user.apartments.index') }}">
                                    <i class="fa-solid fa-building fa-fw me-1"></i>
                                    Apartments
                                </a>
                            </li>
                            <li class="fs-6 nav-item">
                                <a class="nav-link {{ Route::current()->getName() == 'user.messages.index' ? 'active' : '' }}"
                                    href="{{ route('user.messages.index') }}">
                                    <i class="fa-solid fa-envelope fa-fw me-1"></i>
                                    Messages
                                </a>
                            </li>
                            {{-- <li class="fs-6 nav-item">
                                <a class="nav-link {{ Route::current()->getName() == 'user.reports.index' ? 'active' : '' }}"
                                    href="#">
                                    <i class="fa-solid fa-chart-simple"></i>
                                    Reports
                                </a>
                            </li> --}}

                            <li class="nav-item">
                                <a class="fs-6 nav-link {{ Route::current()->getName() == '' ? 'active' : '' }}"
                                    aria-current="page" href="http://localhost:5174/">
                                    <i class="fa-solid my-fa-solid fa-house fa-fw me-1"></i>
                                    Homepage
                                </a>
                            </li>


                            <hr id="hr-sidebar" class="mt-auto">

                            <li class="fs-6 nav-item pb-3 me-1">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-right-from-bracket fa-fw"></i>
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
