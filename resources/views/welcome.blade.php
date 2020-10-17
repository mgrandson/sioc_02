<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | {{ config('app.business', 'CR') }}</title>

    <!-- Scripts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light mb-4 static-top shadow-sm border-bottom-secondary">

        <div class="container">
            <h5 class="m-0 font-weight-bold text-gray d-none d-sm-none d-md-block">

                <h1 class="h3 mb-0 text-gray-800 d-none d-sm-none d-md-block">
                    {{ config('app.business', 'CR') }}
                </h1>

                <h5 class="m-0 font-weight-bold text-dark d-block d-sm-block d-md-none">
                    {{ config('app.business', 'CR') }}
                </h5>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if (Route::has('login'))

                            @auth

                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link" href="{{ url('/home') }}" role="button">
                                        <span class="mr-2 d-lg-inline text-gray-600">Inicio</span>
                                    </a>
                                </li>
                            @else
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link" href="{{ route('login') }}" role="button">
                                        <span class="mr-2 d-lg-inline text-gray-600 ">{{ __('Login') }}</span>
                                    </a>
                                </li>

                                @if (Route::has('register'))
                                    <li class="nav-item dropdown no-arrow">
                                        <a class="nav-link" href="{{ route('register') }}" role="button">
                                            <span class="mr-2 d-lg-inline text-gray-600 ">{{ __('Register') }}</span>
                                        </a>
                                    </li>

                                @endif
                            @endauth
                        @endif
                    </ul>

                </div>
        </div>
    </nav>



    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card-group">
            <div class="card">
                <img src="{{ asset('img/shoe_01.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Imagen 01</h5>
                    <p class="card-text">Descripción breve.</p>
                </div>
                <!--div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div-->
            </div>
            <div class="card">
                <img src="{{ asset('img/shoe_02.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Imagen 02</h5>
                    <p class="card-text">Descripción breve.</p>
                </div>
                <!--div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div-->
            </div>
            <div class="card">
                <img src="{{ asset('img/shoe_03.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Imagen 03</h5>
                    <p class="card-text">Descripción breve.</p>
                </div>
                <!--div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div-->
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>
</body>

</html>
