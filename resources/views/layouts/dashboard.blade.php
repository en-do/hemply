<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="dashboard">
    <div id="app">

        <div class="wrapper">
            <aside class="app-sidebar overflow-hidden flex-column-fluid">
                <div class="app-sidebar-wrapper hover-scroll-overlay-y py-5">
                    <div class="logo-sidebar text-center mb-5">
                        <a class="fs-3 navbar-brand fw-bolder text-white text-uppercase py-1" href="{{ url('/') }}">
                            HEMPLY <span class="badge bg-primary text-lowercase">club</span>
                        </a>
                    </div>
                    <div class="nav-sidebar">
                        <ul class="nav flex-column">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Публікації та категорії
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('dashboard.posts') }}">Публікації</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('dashboard.categories') }}">Категорії</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Сорти та параметри
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('dashboard.strains') }}">Сорти</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('dashboard.phenotypes') }}">Фенотипи</a></li>
                                    <li><a class="dropdown-item" href="{{ route('dashboard.cannabinoids') }}">Канабіноїди</a></li>
                                    <li><a class="dropdown-item" href="{{ route('dashboard.terpenes') }}">Терпени</a></li>
                                    <li><a class="dropdown-item" href="{{ route('dashboard.effects') }}">Ефекти</a></li>
                                </ul>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard.users') }}">Користувачі</a>
                            </li>
                        </ul>

                        <ul class="nav flex-column">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Авторизація</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}"></a>
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
            </aside>

            <main class="app-content">
                <div class="content">
                    <div class="container-xxl">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>

    </div>
</body>
</html>
