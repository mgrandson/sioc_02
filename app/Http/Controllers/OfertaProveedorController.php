<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfertaProveedorController extends Controller
{

    public function __construct()
    {
        $this->middleware('provider');
    }

    public function ofertaProveedor()
    {
        return view('proveedor/ofertaProveedor');
    }

    public function ofertaProveedorItem()
    {
        return view('proveedor/ofertaProveedorItem');
    }

    public function ofertaTienda()
    {
        return view('proveedor/ofertaTienda');
    }

    public function pedidoTienda()
    {
        return view('proveedor/pedido');
    }







    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
