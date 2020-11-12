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
                @if ($oferta_activa)
                    <form action="">
                        @csrf
                        <button type="submit" class="btn btn-dark" >Publicar</button>
                    </form>
                @else
                    <form action="{{ route('ofertaProveedor.crearOferta') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-dark">
                            Agregar
                        </button>
                    </form>
                @endif


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
                            <td>{{ $offer->business['name'] }}</td>
                            <td>{{ date('d-m-Y', strtotime($offer->created_at)) }}</td>
                            <td>{{ $offer->offer_status }}</td>
                            <td>
                                <a class="nav-link d-inline" href="{{ route('oferta.editar', $offer->id) }}">
                                    <i class="fas fa-sm fa-pen"></i>
                                </a>

                                <form action="{{ route('oferta.eliminar', $offer->id) }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button style="border: none; background: transparent;" type="submit">
                                        <i class="fas fa-sm fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
