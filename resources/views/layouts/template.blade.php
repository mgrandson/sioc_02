<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="FIA-UES">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | {{ config('app.business', 'CR') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

    <link href="{{ asset('css/fileinput.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/jquery-confirm.min.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layouts.sidebar.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @if (session('mensaje'))
                    <!---- Toast Boostrap ---->
                    <div aria-live="polite" aria-atomic="true">
                        <!-- Position it -->
                        <div style="position: absolute; top: 72px; right: 2px;">

                            <!-- Then put toasts within -->
                            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
                                <div class="toast-header">
                                    <!--img src="..." class="rounded mr-2" alt="..."-->
                                    <strong class="mr-auto">{{ config('app.name', 'SIOC') }}</strong>
                                    <!--small class="text-muted">2 seconds ago</small-->
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toast-body">
                                    @yield('toast-body')
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!------------------------ End Toast Boostrap ----------------------------------->

                @yield('message')

                @include('layouts.topbar.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <main>
                        @yield('content')
                    </main>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SIOC - Calzado Rosita, 2020.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Está seguro?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Salir" para cerrar la sesión..</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <!--a class="btn btn-primary" href="login.html">{ { __('Logout') }}</a-->

                    <a class="btn btn-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
     document.getElementById('logout-form').submit();">
                        Salir
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/app.js') }}"></script>
    <!--script src="{ { asset('vendor/jquery/jquery.min.js') }}"></script-->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>

    <script src="{{ asset('js/fileinput.js') }}"></script>
    <!--script src="{ { asset('js/theme.js') }}"></script-->
    <script src="{{ asset('themes/fas/theme.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/locales/es.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/jquery-confirm.min.js') }}"></script>
    <!-- Page level plugins -->
    <!--script src="{ { asset('vendor/chart.js/Chart.min.js') }}"></script-->

    <!-- Page level custom scripts -->
    <!--script src="{ { asset('js/demo/chart-area-demo.js') }}"></script-->
    <!--script src="{ { asset('js/demo/chart-pie-demo.js') }}"></script-->

    <script>
        $(document).ready(function() {
            $('.toast').toast('show');
        });

    </script>

@yield('scripts')

</body>

</html>
