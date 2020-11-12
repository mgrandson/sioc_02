@extends('layouts.template')

<!-- #### USER VIEW #### -->


@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestion de Proveedores</h1>
            <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
        </div>

        <!-- Content Row -->

        <div class="row">
            <!-- Area Usuarios -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Encabezado Usuarios - Dropdown -->
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Usuarios Locales</h6>
                    </div>
                    <!-- Tabla de Usuarios -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <th scope="row">{{ $usuario->id }}</th>
                                            <td>{{ $usuario->name }} {{ $usuario->last_name }} </td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>{{ $usuario->role['role_name'] }}</td>
                                            <td>
                                                <div>

                                                </div class="d-inl">
                                                <a class="nav-link d-inline" href="{{ route('usuario.editar', $usuario) }}">
                                                    <i class="fas fa-sm fa-pen"></i>

                                                </a>

                                                <!--a class="nav-link d-inline" href="">
                                                        <i class="fas fa-sm fa-trash"></i>
                                                    </a-->

                                                <form action="{{ route('usuario.eliminar', $usuario) }}" method="POST"
                                                    class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button style="border: none; background: transparent;" type="submit">
                                                        <i class="fas fa-sm fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $usuarios->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->


    @endsection
