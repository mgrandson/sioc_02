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
                            <th>Genero</th>
                            <th>Estilo</th>
                            <th>Talla</th>
                            <th>Unidad</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>SubTotal</th>
                            <th>Acciones</th>
    
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total = 0;
                        $id = 0;
                        @endphp
                        @foreach ($oferta->Items()->get() as $item)
                            @php
                            $total = $total + $item->price * $item->quantity_offered;
                            $id=$id+1;
                            @endphp
                            <tr>
                                <td>{{ $id }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->style }}</td>
                                <td>{{ $item->size }}</td>
                                <td>{{ $item->unit }} </td>
                                <td>{{ $item->quantity_offered }}</td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td>${{ number_format($item->price * $item->quantity_offered, 2) }}</td>
                                <!-- td>
                                    @ foreach ($item->photos()->get() as $photo)
                                    { {$photo->path}}
                                    @ endforeach
                                </td-->
                                <td>
                                    <a class="nav-link d-inline"
                                        href="{{ route('verItemOfertaTienda', [$oferta->id, $item->id]) }}">
                                        <i class="fas fa-sm fa-eye"></i>
                                    </a>    
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6"></td>
                            <td>Total</td>
                            <td>${{ number_format($total, 2) }}</td>
    
                            <td>
    
                            </td>
                            <td></td>
                        </tr>
                </table>
            </div>

            
        </div>




        <!-- MODAL -->
        <!-- END MODAL -->
@endsection
