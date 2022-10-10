<!doctype htms>
<htms lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/admin.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Font-Awesome cdn v6 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <div id="header-guest" class="w-100 px-0 py-1">
            <div class="container align-items">
                <nav class="d-flex justify-content-between align-items-center py-1">
                    <a href="/" class="logo text-decoration-none">
                        <img src="/img/Deliveboo_Logo.png" alt="DeliveBoo logo" />
                    </a>

                    <div class="navbar" id="navbarNav">

                        <!-- Right Side Of Navbar -->
                        <div class="navbar-nav d-flex align-items-center">
                            <!-- Authentication Links -->
                            <ul class="d-flex m-0">
                                @guest
                            <li class="nav-item d-flex align-items-center">
                                <a class="btn btn-outline-dark text-uppercase rounded-pill me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item d-flex align-items-center d-none d-sm-inline">
                                <a class="btn btn-outline-dark text-uppercase rounded-pill" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            </ul>
                            @else
                            <div class="nav-item dropdown d-flex align-items-center">
                                <img src="{{asset('storage/' . Auth::user()->image_url) }}"
                                alt="{{Auth::user()->name_resturant}}" class="rounded-circle border border-dark me-3 d-sm-inline d-none" id="user-img-nav">

                                <div class="dropdown">
                                    <button class="btn btn-outline-dark rounded-pill px-3 p-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name_restaurant }}
                                        <i class="fas fa-bars p-1"></i>
                                    </button>
                                    <ul class="dropdown-menu bg-dropdown border border-dark" aria-labelledby="dropdownMenuLink">

                                        <li class="dropdown-item text-center p-0">
                                            <a class="text-decoration-none text-black"  href="{{ route('home') }}" role=“button">
                                                <i class="fas fa-house me-1"></i>
                                                Home
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li class="dropdown-item text-center p-0">
                                            <a class="text-decoration-none text-black" href="{{ route('admin.dishes.index') }}" role=“button">
                                                <i class="fas fa-utensils me-1"></i>
                                                Menu
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li class="dropdown-item text-center p-0">
                                            <a class="text-decoration-none text-black" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fas fa-right-from-bracket"></i>
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.orders.index') }}" role=“button">
                                    Lista ordini
                                </a>
                            </li> --}}
                            @endguest
                        </div>
                    </div>
                </nav>
            </div>
        </div>

            <main>
                @yield('content')
            </main>


            @yield('script')
        </div>
    </body>

</htms>
