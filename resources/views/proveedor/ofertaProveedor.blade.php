@extends('layouts.template')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Gestion de Ofertas.</h1>
    <p class="mb-4">Puede crear sus ofertas y consultar las ofertas realizadas.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Registrar Oferta</h6>
        </div>
        <div class="card-body">
            <div class="col-lg-12">
                <div class="p-2">
                    <form>

                        <div class="form-group text-center">
                                <img src="{{asset('img/profile_animal.png')}}" class="img-fluid img-thumbnail" alt="..." style="width: 200px; height:200px">
                                <img src="{{asset('img/profile_animal_02.png')}}" class="img-fluid img-thumbnail" alt="..." style="width: 200px; height:200px">
                                <img src="{{asset('img/profile_animal_03.png')}}" class="img-fluid img-thumbnail" alt="..." style="width: 200px; height:200px">
                                <img src="{{asset('img/profile_animal_04.png')}}" class="img-fluid img-thumbnail" alt="..." style="width: 200px; height:200px">

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <select name="z_para" id="shoe_for" class="form-control">
                                    <option value="" class="m-0 font-weight-bold text-dark">Zapato para</option>
                                    <option value="1">Mujer</option>
                                    <option value="2">Hombre</option>
                                    <option value="3">Niña</option>
                                    <option value="4">Niño</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select name="estilo" id="shoe_style" class="form-control">
                                    <option value="" class="m-0 font-weight-bold text-dark">Estilo</option>
                                    <option value="1">Formal</option>
                                    <option value="2">Casual</option>
                                    <option value="3">Deportivo</option>
                                    <option value="4">Urbano</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select name="tamanio" id="tamanio" class="form-control">
                                    <option value="" class="m-0 font-weight-bold text-dark"> Talla</option>
                                    <option value="1">Talla 4</option>
                                    <option value="2">Talla 5</option>
                                    <option value="3">Talla 6</option>
                                    <option value="4">Talla 7</option>
                                    <option value="5">Talla 8</option>
                                    <option value="6">Talla 9</option>
                                </select>

                            </div>
                            <div class="col-sm-3">
                                <input type="number" name="cantidad" id="cantidad" class="form-control"
                                    placeholder="Cantidad">
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Descripci&oacute;n"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="file" class="form-control-file" id="file">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark">Guardar</button>
                        <button type="submit" class="btn btn-dark">Enviar</button>


                        <hr>

                    </form>
                </div>
            </div>





        </div>
    </div>

    <!-- DataTabla Ofertas -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Historial de Ofertas</h6>
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
    </div>

@endsection
