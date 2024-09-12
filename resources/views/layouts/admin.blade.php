<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href={{ asset('images/DeliveBoo-Photoroom.png') }}>


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- FONT ALICE GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alice&display=swap" rel="stylesheet">

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Usando Vite -->
    {{-- @vite([ 'resources/scss/adminIndex.scss']) --}}
    @vite(['resources/js/app.js', 'resources/scss/adminIndex.scss'])
    @yield('style')



</head>

<body>
    <div id="app">

        <div class="container-fluid vh-100 side-menu">
            <div class="row h-100">
                <nav id="sidebarMenu" class=" col-lg-1 col-xl-2  d-lg-block bg-dark navbar-dark sidebar collapse">
                    <div class="position-sticky pt-3 d-flex flex-column justify-content-between  menu-container">
                        <ul class="nav flex-column">

                            <li>
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'http://localhost:5173' ? 'bg-secondary' : '' }}"
                                    href="http://localhost:5173">
                                    <i class="fa-solid fa-house fa-lg fa-fw"></i> <span
                                        class="d-lg-none d-xl-inline">Home</span>
                                </a>
                            </li>


                            <li>
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.restaurants.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.restaurants.index') }}">
                                    <i class="fa-solid fa-utensils fa-lg fa-fw"></i> <span
                                        class="d-lg-none d-xl-inline">Il tuo Ristorante</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.orders.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.orders.index') }}">
                                    <i class="fa-solid fa-sheet-plastic fa-lg fa-fw"></i> <span
                                        class="d-lg-none d-xl-inline">Ordini</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.products.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.products.index') }}">
                                    <i class="fa-solid fa-burger fa-lg fa-fw"></i> <span
                                        class="d-lg-none d-xl-inline">Menù del ristorante</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.products.create' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.products.create') }}">
                                    <i class="fa-solid fa-plus fa-lg fa-fw"></i> <span
                                        class="d-lg-none d-xl-inline">Aggiungi un piatto</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.stats.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.stats.index') }}">
                                    <i class="fa-solid fa-chart-line fa-lg fa-fw"></i> <span
                                        class="d-lg-none d-xl-inline">Statistiche</span>
                                </a>
                            </li>

                        </ul>

                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-sign-out-alt fa-lg fa-fw"></i> <span
                                        class="d-lg-none d-xl-inline">{{ __('Logout') }}</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>

                    </div>
                </nav>

                <main class=" col-lg-11  col-xl-10  p-0 h-100">
                    @yield('content')
                </main>


                <div class="row p-0 m-0">
                    <ul class="navbar-bottom justify-content-around  col-12 d-lg-none d-flex ">
                        <li>
                            {{-- <a clbot_item ass="nav-link text-white {{ Route::currentRouteName() == 'http://localhost:5173' ? 'bg-secondary' : '' }}" --}}
                            <a class="nav-link text-white {{ Route::currentRouteName() == 'http://localhost:5173' ? 'bg-secondary' : '' }}"
                                href="http://localhost:5173">
                                <i class="fa-solid fa-house fa-lg fa-fw"></i>
                            </a>
                        </li>


                        <li>
                            <a class="bot_item nav-link text-white {{ Route::currentRouteName() == 'admin.restaurants.index' ? 'bg-secondary' : '' }}"
                                href="{{ route('admin.restaurants.index') }}">
                                <i class="fa-solid fa-utensils fa-lg fa-fw"></i>
                            </a>
                        </li>

                        <li>
                            <a class="bot_item nav-link text-white {{ Route::currentRouteName() == 'admin.orders.index' ? 'bg-secondary' : '' }}"
                                href="{{ route('admin.orders.index') }}">
                                <i class="fa-solid fa-sheet-plastic fa-lg fa-fw"></i>
                            </a>
                        </li>

                        <li>
                            <a class="bot_item nav-link text-white {{ Route::currentRouteName() == 'admin.products.index' ? 'bg-secondary' : '' }}"
                                href="{{ route('admin.products.index') }}">
                                <i class="fa-solid fa-burger fa-lg fa-fw"></i>
                            </a>
                        </li>

                        <li>
                            <a class="bot_item nav-link text-white {{ Route::currentRouteName() == 'admin.products.create' ? 'bg-secondary' : '' }}"
                                href="{{ route('admin.products.create') }}">
                                <i class="fa-solid fa-plus fa-lg fa-fw"></i>
                            </a>
                        </li>

                        <li>
                            <a class="bot_item nav-link text-white {{ Route::currentRouteName() == 'admin.stats.index' ? 'bg-secondary' : '' }}"
                                href="{{ route('admin.stats.index') }}">
                                <i class="fa-solid fa-chart-line fa-lg fa-fw"></i>
                            </a>
                        </li>

                        <li>
                            <a class="bot_item nav-link text-white" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa-solid fa-sign-out-alt fa-lg fa-fw"></i>{{ __('') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>


                </div>


            </div>
        </div>

    </div>
</body>

</html>

<style>
    @media only screen and (min-width: 768px) and (max-width: 1200px) {
        .navbar-bottom {
            position: absolute;
            height: 100vh;
            width: 100%;
            bottom: 0;
        }
    }

    @media only screen and (max-width: 767px) {
        .navbar-bottom {
            position: absolute;
            height: 100vh;
            width: 100%;
            bottom: 0;
            padding: 1rem;
        }
    }
</style>
