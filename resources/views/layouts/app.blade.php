<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('styles')

    <style>
        .navbar-custom {
            background-color: #0d0d0d;
            border-bottom: 1px solid #00ffcc;
            box-shadow: 0 0 10px #00ffcc88;
        }

        .navbar-brand,
        .nav-link,
        .dropdown-toggle {
            color: #00ffcc !important;
            font-weight: 600;
            text-shadow: 0 0 5px #00ffcc;
        }

        .nav-link:hover,
        .dropdown-toggle:hover {
            color: #ffffff !important;
        }

        .dropdown-menu {
            background-color: #1a1a1a;
            border: 1px solid #00ffcc;
        }

        .dropdown-item {
            color: #00ffcc;
        }

        .dropdown-item:hover {
            background-color: #00ffcc;
            color: #000;
        }

        .navbar-toggler {
            border: 1px solid #00ffcc;
        }

        .navbar-toggler-icon {
            filter: invert(1) brightness(2);
        }
    </style>
</head>

<body style="background-color: #0d0d0d; color: #ffffff; font-family: 'Segoe UI', sans-serif;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand text-info fw-bold" href="{{ url('/') }}">
                    {{ config('app.name', 'RobotControl') }}
                </a>

                <!-- Bouton hamburger -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Contenu du menu -->
                <div class="collapse navbar-collapse" id="navbarContent">
                    <!-- Partie gauche -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link text-light" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="#">About</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="#">Contact</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="#">FAQ</a></li>
                    </ul>
                    
                    <!-- Partie droite -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-info" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-info" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-info" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end bg-dark" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-light" href="{{ route('logout') }}"
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
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
