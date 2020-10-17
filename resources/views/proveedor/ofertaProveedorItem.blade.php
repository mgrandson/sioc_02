@extends('layouts.template')

@section('content')

    <!---- Toast Alert Messaje ---->
@section('toast-body')
    {{ session('mensaje') }}
@endsection

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Gestion de Ofertas.</h1>
<p class="mb-4">Agregue los productos que desea ofertar.</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-dark">
            Registrar Producto a Ofertar
        </h6>
    </div>
    <div class="card-body">
        <div class="col-lg-12">
            <div class="p-2">
                <div class="form-group row">
                    <div class="col-sm-3">
                        <span class="m-0 font-weight-bold text-dark">Oferta: </span>
                        {{ $oferta->code }}
                    </div>
                    <div class="col-sm-3">
                        <span class="m-0 font-weight-bold text-dark">Creación: </span>
                        {{ date('d-m-Y', strtotime($oferta->created_at)) }}
                    </div>
                    <div class="col-sm-3">
                        <span class="m-0 font-weight-bold text-dark">Estado: </span>
                        {{ $oferta->offer_status }}
                    </div>
                </div>
                <hr />
                <form action="{{ route('ofertaProveedor.crearItem') }}">
                    <input type="hidden" name="offer_id" value="{{ $oferta->id }}" readonly>
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <select name="gender" id="gender"
                                class="form-control form-control-user @error('gender') is-invalid @enderror">
                                <option value="" class="m-0 font-weight-bold text-dark">Zapato para</option>
                                @php
                                $value_gender = 0;
                                foreach ($properties[0] as $gender){
                                echo "<option value=".$value_gender.">".$gender."</option>";
                                $value_gender +=1;
                                }
                                @endphp
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="col-sm-3">
                            <select name="style" id="style"
                                class="form-control form-control-user @error('style') is-invalid @enderror">
                                <option value="" class="m-0 font-weight-bold text-dark">Estilo</option>
                                @php
                                $value_style = 0;
                                foreach ($properties[1] as $style){
                                echo "<option value=".$value_style.">".$style."</option>";
                                $value_style +=1;
                                }
                                @endphp
                            </select>
                            @error('style')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <select name="size" id="size"
                                class="form-control form-control-user @error('size') is-invalid @enderror">
                                <option value="" class="m-0 font-weight-bold text-dark"> Talla</option>
                                @php
                                $value_size = 0;
                                foreach ($properties[2] as $size){
                                echo "<option value=".$value_size.">".$size."</option>";
                                $value_size +=1;
                                }
                                @endphp
                            </select>

                            @error('size')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="col-sm-3">
                            <select name="unit" id="unit"
                                class="form-control form-control-user @error('unit') is-invalid @enderror">
                                <option value="" class="m-0 font-weight-bold text-dark">Unidad</option>
                                @php
                                $value_unit = 0;
                                foreach ($properties[3] as $unit){
                                echo "<option value=".$value_unit.">".$unit."</option>";
                                $value_unit +=1;
                                }
                                @endphp
                            </select>

                            @error('unit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-sm-3">
                            <input type="text" id="price" name="price" placeholder="Precio"
                                class="form-control form-control-user @error('price') is-invalid @enderror">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <input type="number" name="quantity_offered" id="quantity_offered"
                                class="form-control form-control-user @error('quantity_offered') is-invalid @enderror"
                                placeholder="Cantidad Ofertada">

                            @error('number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-sm-3">

                        </div>
                        <div class="col-sm-3">

                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-12">
                            <textarea name="description" id="description"
                                class="form-control form-control-user @error('description') is-invalid @enderror"
                                placeholder="Descripci&oacute;n"></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <img src="{{ asset('img/shoe_01.png') }}" class="img-fluid img-thumbnail" alt="..."
                                style="width: 200px; height:200px">
                            <img src="{{ asset('img/shoe_02.png') }}" class="img-fluid img-thumbnail" alt="..."
                                style="width: 200px; height:200px">
                            <img src="{{ asset('img/shoe_03.png') }}" class="img-fluid img-thumbnail" alt="..."
                                style="width: 200px; height:200px">
                            <img src="{{ asset('img/shoe_04.png') }}" class="img-fluid img-thumbnail" alt="..."
                                style="width: 200px; height:200px">
                        </div>
                        <hr />
                        <div class="col-sm-6 row">
                            <input type="file" name="picture_file" class="form-control-file" id="picture_file"
                                class="form-control form-control-user @error('picture_file') is-invalid @enderror">
                            @error('picture_file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">Agregar</button>
                    <button type="submit" class="btn btn-dark" disabled>Guardar</button>
                    <button type="submit" class="btn btn-dark" disabled>Enviar</button>
                    <hr>

                </form>
            </div>
        </div>
        <h1 class="h5 mb-2 text-gray-800">Items de {{ $oferta->code }} - Edicion.</h1>
        <hr />
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
                            <td>{{ $item->unit }}</td>
                            <td>{{ $item->quantity_offered }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>${{ number_format($item->price * $item->quantity_offered, 2) }}</td>
                            <td>x</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="6"></td>
                        <td>Total</td>
                        <td>${{ number_format($total, 2) }}</td>
                        <td></td>
                    </tr>
            </table>
        </div>




    </div>
</div>

@endsection
