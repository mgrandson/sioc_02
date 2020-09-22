@extends('layouts.template')

<!-- #### USER VIEW #### -->


@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestion de Usuarios</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row - Formulario -->
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Encabezado Formulario - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-dark">Cuenta de Empleado</h6>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block"></div>
                    <div class="col-lg-7">
                        <div class="p-5">                        
                            <form class="">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Nombre">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="last_name"  class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Apellido">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Correo Electrónico">
                                </div>
                                <div class="form-group row">
                                  <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select id="inputState" class="form-control form-control-user">
                                      <option selected>Seleccione...</option>
                                      <option>...</option>
                                    </select>
                                  </div>
                                  <div class="col-sm-6">
                                    <select id="inputState" class="form-control form-control-user">
                                        <option selected>Seleccione...</option>
                                        <option>...</option>
                                      </select>
                                </div>                                  
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Contraseña">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repetir Contraseña">
                                    </div>
                                </div>
                                <a href="login.html" class="btn btn-dark btn-user btn-block">
                                    Registrar Empleado
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Usuarios -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Encabezado Usuarios - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-dark">Usuarios Locales</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Opciones Adicionales:</div>
                                <a class="dropdown-item" href="#">Accion 01</a>
                                <a class="dropdown-item" href="#">Accion 02</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Accion 03</a>
                            </div>
                        </div>
                    </div>
                    <!-- Tabla de Usuarios -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Tipo Usuario</th>
                                    <th scope="col">Nivel Acceso</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <th scope="row">{{ $usuario->id }}</th>
                                        <td>{{ $usuario->name }} {{ $usuario->last_name }} </td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->job }}</td>
                                        <td>
                                            @if ($usuario->user_type === 1)
                                                sysmanager
                                            @endif
                                        </td>
                                        <td>
                                            @if ($usuario->access_level === 1)
                                                alpha
                                            @endif
                                        </td>
                                        <td>x</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection
