<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use App\Item;

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
        $offers = Offer::all()->where('offer_status', 2);

        foreach ($offers as $offer) {
            error_log('OFERTA: ' . $offer['code']);
        }
        return view('proveedor/ofertaTienda', compact('offers'));
    }

    public function verOfertaTienda($offerId){
        $oferta = Offer::findOrFail($offerId);
        return view('proveedor/ofertaTiendaConsultar', compact('oferta'));
    }

    public function verItemOfertaTienda($offerId, $itemId){
        $oferta = Offer::findOrFail($offerId);
        $item = Item::findOrFail($itemId);
        return view('proveedor/ofertaTiendaItem', compact('oferta'),compact('item'));
    }

    public function pedidoTienda()
    {
        return view('proveedor/pedido');
    }
}
