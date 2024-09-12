<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href={{ asset('images/DeliveBoo-Photoroom.png') }}>

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- FONT ALICE GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alice&display=swap" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    @yield('style')
</head>

<body>
    <div id="app">

        <header class="p-3 text-white d-flex align-items-center" id="my_headerLayout">
            <div class="container-fluid h-auto ">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="http://localhost:5173"
                        class="d-flex align-items-center mb-2 mb-lg-0 text-white text-center text-decoration-none">
                        <img src={{ asset('images/DeliveBoo-Photoroom.png') }} alt="logo DeliveBoo" id="my_logo">
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="http://localhost:5173/#video" class="nav-link px-2 text-white">Home</a></li>
                        <li><a href="http://localhost:5173/#ristoranti" class="nav-link px-2 text-white">Lista
                                Ristoranti</a></li>
                        <li><a href="http://localhost:5173/#servizi" class="nav-link px-2 text-white">Cosa offriamo</a>
                        </li>
                        <li><a href="http://localhost:5173/#lavora" class="nav-link px-2 text-white">Lavora con noi</a>
                        </li>
                    </ul>

                    <div class="">
                        @guest
                            <a href="{{ route('auth') }}">
                                <button type="button" class="btn btn-warning my_button">Login/Registrati</button>
                            </a>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->restaurant->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </div>
                </div>
            </div>
        </header>
        <main class="">
            @yield('content')
        </main>
    </div>

    @yield('pageScript')
</body>

</html>
