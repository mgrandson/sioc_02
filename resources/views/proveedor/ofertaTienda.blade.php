@extends('layouts.template')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Ofertas Recibidas.</h1>
    <p class="mb-4"></p>
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
                    <tbody>
                        @foreach ($offers as $offer)
                            <tr>
                                <td>{{ $offer->correlative }}</td>
                                <td>{{ $offer->code }}</td>
                                <td></td>
                                <td>{{ $offer->business['name'] }}</td>
                                <td>{{ date('d-m-Y', strtotime($offer->created_at)) }}</td>
                                <td>{{ $offer->offer_status }}</td>
                                <td>
                                    <a class="nav-link d-inline" href="{{ route('verOfertaTienda', $offer->id) }}">
                                        <i class="fas fa-sm fa-eye"> Ver </i>
                                    </a>
    

    
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>




        <!-- MODAL -->
        <!-- END MODAL -->
@endsection
