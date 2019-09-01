<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blockbuster DH</title>
        <link rel="shortcut icon" sizes="60x60" href="https://cdn.iconscout.com/icon/free/png-256/laravel-226015.png">
        <link rel="icon" type="image/png" sizes="60x60" href="https://cdn.iconscout.com/icon/free/png-256/laravel-226015.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="{{url('css/app.css')}}">

        <script defer src="{{url('js/app.js')}}"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-dark bg-dark">
                <a class="navbar-brand" href="#">
                    <img src="https://cdn.iconscout.com/icon/free/png-256/laravel-226015.png" width="30" height="30" class="d-inline-block mr-2" alt="Laravel">
                    Blockbuster DH
                </a>
                @guest
                    <ul class="navbar-nav flex-row mr-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link pr-2">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/catalogo" class="nav-link pr-2">Cátalogo de Filmes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pr-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastro') }}</a>
                            </li>
                        @endif
                    </ul>
                @else
                    <ul class="navbar-nav flex-row mr-auto">
                        <li class="nav-item">
                            <a href="/home" class="nav-link pr-2">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/filmes" class="nav-link pr-2">Filmes</a>
                        </li>
                        <li class="nav-item">
                            <a href="/filmes/adicionar" class="nav-link pr-2">Cadastrar Filme</a>
                        </li>
                        <li class="nav-item">
                            <a href="/generos" class="nav-link pr-2">Gêneros</a>
                        </li>
                        <li class="nav-item">
                            <a href="/generos/adicionar" class="nav-link pr-2">Cadastrar Gêneros</a>
                        </li>
                        <li class="nav-item">
                            <a href="/atores" class="nav-link pr-2">Atores</a>
                        </li>
                        <li class="nav-item">
                            <a href="/atores/adicionar" class="nav-link pr-2">Cadastrar Atores</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav flex-row ml-auto">
                        <li class="nav-item">
                            <a class="nav-link pr-4" href="">
                                Olá {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Sair') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                @endguest
            </nav>
        </header>
        <main class="container my-5">
            @yield('content')
        </main>
    </body>
</html>
