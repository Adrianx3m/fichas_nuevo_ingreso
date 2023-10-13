<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://www.tecomatlan.tecnm.mx/wp-content/uploads/2020/01/cropped-itt-192x192.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>{{ config('app.name', 'Solicitud de Fichas TecNM Campus Tecomatlán') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

   
    
    <!-- Style -->
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .barrita{
            background-color:#2C3E50 !important;
            height: 90px;
            max-width:100%;
        }
        .barrita1{
            background-color:#2C3E50 !important;
        }
        .myClass{
                font-weight: bold;
                text-decoration:none;
                font-size:16px;
                margin-top:-1px;
            }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="max-width:100%;">
            <div class="container">
                <h4 class="navbar-brand">
                    {{ config('app.name', 'Solicitud de Fichas TecNM Campus Tecomatlán') }}
                </h4>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>
                                   

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    
                                </div>
                                
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <div id="foot">
        <main>
        <myfooter></myfooter>
        </main>
    </div>
    <nav class="navbar navbar-expand-lg fixed-top text-white barrita" id="mainNav" style="">
        <div class="container">
            <a ><h4 class="text-white text-uppercase fw-bold">{{ config('app.name', 'Solicitud de Fichas TecNM Campus Tecomatlán') }}</h4></a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 myClass text-white" href="{{ route('login') }}">Iniciar Sesión</a></li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 myClass text-white" href="{{ route('register') }}">Registrarse</a></li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white myClass" href="#" role="button" data-bs-toggle="dropdown" >
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end barrita1" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item myClass text-white" href="/home">Inicio</a>
                            @if(@Auth::user()->hasRole('aspirante'))
                                        <a class="dropdown-item myClass text-white" href="/solicitud">Solicitud</a>
                                        <a href="/comprobantes" class="dropdown-item myClass text-white">Comprobante de pago</a>
                            @endif
                            @if(@Auth::user()->hasRole('admin'))
                                        <a class="dropdown-item myClass text-white" href="/solicitudes/admin">Lista de aspirantes</a>
                                        <a class="dropdown-item myClass text-white" href="/fechasExamen">Configuraciones</a>
                            @endif
                            @if(@Auth::user()->hasRole('financiero'))
                                        <a class="dropdown-item myClass text-white" href="/recibos">Comprobantes</a>
                            @endif
                                <a class="dropdown-item myClass text-white" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>            
            </div>        
        </div>
</nav>
    
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
</body>
</html>
