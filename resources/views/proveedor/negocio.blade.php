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
                        <h6 class="m-0 font-weight-bold text-dark">Proveedores</h6>
                    </div>
                    <!-- Tabla de Usuarios -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">NIT</th>
                                        <th scope="col">Representante</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($negocios as $negocio)
                                        <tr>
                                            <th scope="row">{{$negocio->id}}</th>
                                            <td>{{ $negocio->name }} </td>
                                            <td>{{ $negocio->tax_num_id }} </td>
                                            <td>{{$negocio->user['name'].' '.$negocio->user['last_name'] }}</td>
                                        <td>{{$negocio->phone}}</td>
                                        <td>{{$negocio->user['email']}}</td>
                                        <td></td>
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
