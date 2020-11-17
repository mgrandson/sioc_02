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
                
                <form action="{{ route('ofertaProveedor.crearOferta') }}" method="POST">
                    @csrf
                    @if (!$oferta_activa)
                    <button type="submit" class="btn btn-dark">
                        Agregar
                    </button>
                    @else
                    <button type="submit" class="btn btn-dark" disabled="true">
                        Agregar
                    </button>
                    @endif

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
                                @if ($offer->offer_status!=2)
                                    <form action="{{ route('oferta.eliminar', $offer->id) }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button style="border: none; background: transparent;" type="submit">
                                            <i class="fas fa-sm fa-trash"></i>
                                        </button>
                                    </form>
                                    @if (count($offer->items)!=0)
                                        <form action="{{ route('ofertaProveedor.publicarOferta', $offer->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button style="border: none; background: transparent;" type="submit">
                                                <i class="fas fa-sm fa-share-square"></i>
                                            </button>
                                        </form>                                        
                                    @endif               
                                @endif
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
