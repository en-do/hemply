<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('title')
        @if(request()->get('page'))
            <title>Сторінка: {{ request()->get('page') }} - @yield('title') | HEMPLY.CLUB</title>
        @else
            <title>@yield('title') | HEMPLY.CLUB</title>
        @endif
    @else
        <title>HEMPLY.CLUB - Інформаційний ресурс про коноплі українською</title>
    @endif

    @if(request()->get('page'))
        <meta content="Сторінка: {{ request()->get('page') }} - @yield('description')" name="description"/>
    @else
        <meta content="@yield('description')" name="description"/>
    @endif

    @hasSection('keywords')
        <meta content="@yield('keywords')" name="keywords"/>
    @endif

    @hasSection('no_index')
        <meta name="robots" content="noindex,nofollow">
    @endif

    <link href="{{ request()->url() }}" rel="canonical" />

    @hasSection('title')
        <meta property="og:title" content="@yield('title')">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ request()->url() }}">
        <meta property="og:image" content="https://hemply.club/images/logo.svg">
        <meta property="og:description" content="@yield('description')️">
    @endif

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app" class="wrapper">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark">
                <div class="container">
                    <a class="fs-3 navbar-brand fw-bolder text-uppercase py-1 me-5" href="{{ url('/') }}">
                        HEMPLY <span class="badge bg-primary text-lowercase">club</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a href="{{ route('articles') }}" class="nav-link fw-bold">Публікації</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('phenotype.page') }}" class="nav-link fw-bold">Фенотипи та Генотипи</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('terpene.page') }}" class="nav-link fw-bold">Терпени</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cannabinoid.page') }}" class="nav-link fw-bold">Канабіноїди</a>
                            </li>
                        </ul>


                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <a href="{{ route('strains') }}" class="btn btn-warning">Каталог сортів</a>

                            @auth
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
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="footer pt-4 pb-4">
            <div class="container">

                <div class="">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a href="{{ route('about') }}" class="nav-link">
                                <span>Про проект</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span>t.me/hemply</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="mailto:support@hemply.club" class="nav-link">
                                <span>support@hemply.club</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="copyright opacity-75">
                    <p class="mb-0">
                        with love from
                        <svg width="15" height="12" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="rounded">
                            <path d="M30 0H0V20H30V0Z" fill="#005BBB"/>
                            <path d="M30 10H0V20H30V10Z" fill="#FFD500"/>
                        </svg>
                        &nbsp;
                        <strong>&copy; 2022</strong>
                    </p>
                </div>

            </div>
        </footer>

        <div class="alert-modal" :class="{'d-block': !hideTermsModal}" v-if="hideTermsModal == false">
            <div class="modal-backdrop fade show"></div>
            <div class="modal modal-terms fade show d-block">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Правила використання</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="closeTermsModal()"></button>
                        </div>
                        <div class="modal-body text-center">
                            <p>Всі дані, що містяться на сайті, надаються у вигляді наукових довідок, які є загальнодоступними і несуть виключно інформативний характер та не є призивом до дії.</p>

                            <div class="button mt-4">
                                <button class="btn btn-warning" @click="acceptTermsModal()">Ознайомлений</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
