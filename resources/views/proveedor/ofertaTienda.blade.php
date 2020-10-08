@extends('layouts.template')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Ofertas Recibidas.</h1>
    <p class="mb-4"></p>
    <!-- DataTabla Ofertas -->
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <h6 class="m-0 font-weight-bold text-dark">Oferta</h6>
        </div>
        <div class="card-body">
            <div class="form-group text-center table-responsive" style="height: 250px;">

                    <img src="{{ asset('img/shoe_01.png') }}"  id="myImg" class="mh-100 img-fluid img-thumbnail" alt="...">

                    <img src="{{ asset('img/shoe_02.png') }}" id="myImg" class="mh-100 img-fluid img-thumbnail" alt="...">

                    <img src="{{ asset('img/shoe_03.png') }}" id="myImg" class="mh-100 img-fluid img-thumbnail" alt="...">

                    <img src="{{ asset('img/shoe_04.png') }}" id="myImg" class="mh-100 img-fluid img-thumbnail" alt="...">
            </div>
        </div>
    </div>


    <!-- DataTabla Ofertas -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Historial de Ofertas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>#</td>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Proveedor</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>#</td>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Proveedor</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Oferta A</td>
                            <td>Descripcion A</td>
                            <td>Proveedor 01</td>
                            <td>25/09/2020</td>
                            <td>Pendiente</td>
                            <td>x</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Oferta B</td>
                            <td>Descripcion B</td>
                            <td>Proveedor 02</td>
                            <td>20/09/2020</td>
                            <td>Revisada</td>
                            <td>x</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Oferta C</td>
                            <td>Descripcion C</td>
                            <td>Proveedor 03</td>
                            <td>15/09/2020</td>
                            <td>Revisada</td>
                            <td>x</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Oferta D</td>
                            <td>Descripcion D</td>
                            <td>Proveedor 04</td>
                            <td>15/09/2020</td>
                            <td>Revisada</td>
                            <td>x</td>
                        </tr>
                </table>
            </div>
        </div>




        <!-- MODAL -->
        <!-- END MODAL -->
@endsection
