@extends('layouts.template')

@section('content')

<!---- Toast Alert Messaje ---->
@section('toast-body')
        {{ session('mensaje') }}
@endsection

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Gestion de Ofertas.</h1>
<p class="mb-4">Puede crear sus ofertas y consultar las ofertas realizadas.</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Registrar Oferta</h6>
    </div>
    <div class="card-body">
        <div class="col-lg-12">
            <div class="p-2">

                <form action="{{ route('ofertaProveedor.crearOferta') }}">
                    @csrf
                    <button type="submit" class="btn btn-dark">
                        @if ($oferta_activa)
                            Editar
                        @else
                            Agregar
                        @endif
                    </button>
                    <button type="submit" class="btn btn-dark" disabled>Guardar</button>
                    <button type="submit" class="btn btn-dark" disabled>Enviar</button>
                </form>
            </div>
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
                    @foreach ($offers as $offer)
                        <tr>
                            <td>{{ $offer->correlative }}</td>
                            <td>{{ $offer->code }}</td>
                            <td>Descripcion A</td>
                            <td>{{ $offer->business['name'] }}</td>
                            <td>{{ date('d-m-Y', strtotime($offer->created_at)) }}</td>
                            <td>{{ $offer->offer_status }}</td>
                            <td>x</td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
