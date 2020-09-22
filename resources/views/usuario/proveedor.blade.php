@extends('layouts.template')

<!-- #### USER VIEW #### -->


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Gestion de Proveedores</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->

  <div class="row">

    <!-- Area Usuarios -->
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Encabezado Usuarios - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Usuarios Locales</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
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
                <th scope="col">Cargo</th>
                <th scope="col">Nivel Acceso</th>
                <th scope="col">Correo</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark Otto</td>
                <td>Cajero</td>
                <td>2</td>
                <td>mail@sioc.com</td>
                <td>x</td>
              </tr>
              <tr>
                <th scope="row">1</th>
                <td>Mark Otto</td>
                <td>Cajero</td>
                <td>2</td>
                <td>mail@sioc.com</td>
                <td>x</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>    
  </div>

</div>
<!-- /.container-fluid -->


@endsection