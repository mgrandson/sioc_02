<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ofertaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('manager');
    }

    public function ofertaTienda()
    {
        return view('proveedor/ofertaTienda');
    }

    public function pedidoTienda()
    {
        return view('proveedor/pedido');
    }
}
