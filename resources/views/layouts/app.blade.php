<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Botstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
</head>
<body>
    <style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laundry') }}
                </a>
                        
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav justify-content-center">
                        <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0"> -->
                            <li class="nav-item">
                                <a href="{{ url('/member') }}" class="nav-link" aria-current="page">Registrasi Pelanggan</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/outlet') }}" class="nav-link">Outlet</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/paket') }}" class="nav-link">Paket Cucian</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/user') }}" class="nav-link">User</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/transaksi') }}" class="nav-link">Entri Transaksi</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/laporan') }}" class="nav-link">Laporan</a>
                            </li>
                        <!-- </ul> -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

<!-- Script JS -->
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>
