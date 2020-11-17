<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Business;
use App\Offer;
use App\Photo;
use App\User;
use App\Events\OfferEvent;
use App\Notifications\OfferNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OfertaProveedorController extends Controller
{

    public function __construct()
    {
        $this->middleware('provider');
    }

    public function ofertaProveedor()
    {
        $business_id = $this->comprobarNegocio();
        $oferta = $this->obtenerOfertaEstado($business_id, 1);
        $oferta_activa = 0;
        if (is_null($oferta)) {
        } else {
            $oferta_activa = 1;
        }

        $offers = App\Offer::all()->where('business_id', $business_id);

        foreach ($offers as $offer) {
            error_log('OFERTA: ' . $offer['code']);
        }
        return view('proveedor/ofertaProveedor', compact('offers'), compact('oferta_activa'));
    }

    public function crearItem(Request $request)
    {

        $success = false;

        $request->validate([
            'gender' => ['required', 'string'],
            'style' => ['required', 'string'],
            'size' => ['required', 'string'],
            'description' => ['required', 'string', 'min:8'],
            'quantity_offered' => 'required',
            'unit' => 'required',
            'price' => 'required',
            'picture_file' => 'nullable|file|max:5000|mimes:pdf,docx,doc',
        ]);
        //$request->file('picture_file');.

        DB::beginTransaction();
        try {

            $properties = $this->definirPropiedadItem($request->gender, $request->style, $request->size, $request->unit);

            $newItem = new App\Item;
            $newItem->gender = $properties[0];
            $newItem->style = $properties[1];
            $newItem->size = $properties[2];
            $newItem->unit = $properties[3];
            $newItem->description = $request->description;
            $newItem->quantity_offered = $request->quantity_offered;
            $newItem->quantity_ordered = 0;
            $newItem->price = $request->price;
            $newItem->item_status = 1;

            if ($newItem->save()) {
                $offer_id = $request->offer_id;
                $total = $request->price * $request->quantity_offered;
                $newItem->offers()->attach($offer_id, ['total' => $total]);
                $success = true;
            }

            error_log("\nNUEVO ITEM AGREGADO");
        } catch (\Throwable $th) {
            error_log($th);
        }

        if ($success) {
            DB::commit();
            return back()->with('mensaje', 'Nuevo producto agregado a la oferta.');
        } else {
            DB::rollback();
            return back()->with('mensaje', 'Ha sucedido un error.');
        }
    }

    public function editarItem($offerId, $itemId)
    {
        $oferta = App\Offer::findOrFail($offerId);
        $item = App\Item::findOrFail($itemId);
        $properties = $this->mostrarPropiedadesItem();
        $fotos = App\Photo::where($itemId);
        return view('proveedor/foto', compact('oferta'), compact('item'), compact('fotos'), compact('properties'));
    }

    public function eliminarItem($offerId, $itemId)
    {
        $oferta = App\Offer::findOrFail($offerId);
        $item = App\Item::findOrFail($itemId);
        $offerCode = $oferta->code;

        //Borrando fotos del disco.
        foreach($item->photos()->get() as $photo){
            error_log($photo->filename);            
            Storage::delete('public/offer_photos/'.$photo->filename);
        }

        //Borrando item de la base de datos. 
        $item->delete();
        return back()->with('mensaje', 'Item de oferta ' . $offerCode . ' eliminado.');
    }
    
    public function ofertaTienda()
    {
        return view('proveedor/ofertaTienda');
    }

    public function publicarOferta($offerId){
        $offer = Offer::findOrFail($offerId);
        $offer->offer_status = 2;

        $offer->save();

        /*User::where('role_id', 2)->each(function(User $user) use ($offer){
            $user->notify(new OfferNotification($offer));
        });*/
        //auth()->user()->notify(new OfferNotification($offer));

        event(new OfferEvent($offer));

        return back()->with('mensaje', 'La oferta ha sido publicada.');
    }

    public function pedidoTienda()
    {
        return view('proveedor/pedido');
    }


    public function crearOferta()
    {

        $business_id = $this->comprobarNegocio();
        $oferta = $this->obtenerOfertaEstado($business_id, 1);
        $new_offer_code = $this->generarCodigoOferta($business_id);

        //Creando nueva oferta para la edición.

        if ($business_id <> 0) {
            if (is_null($oferta)) {
                $newOferta = new App\Offer;
                $newOferta->business_id = $business_id;
                $newOferta->correlative = $this->obtenerMaximoCorrelativoOferta($business_id) + 1;
                $newOferta->code = $new_offer_code;
                $newOferta->offer_status = 1;
                $newOferta->save();
                $oferta = $this->obtenerOfertaEstado($business_id, 1);
            }

            $properties = $this->mostrarPropiedadesItem();
            return back()->with('mensaje', 'Se agrego una nueva oferta.');
        }
        return back()->with('mensaje', 'Primero asocie un negocio.');
    }

    public function editarOferta($ofertaId)
    {
        $oferta = App\Offer::findOrFail($ofertaId);
        $properties = $this->mostrarPropiedadesItem();

        foreach ($oferta->items as $item) {
            error_log("ITEM: ".$item->gender);
            foreach ($item->photos as $photo) {
                error_log("FOTO: ".$photo->filename);
            }
        }
        return view('proveedor/ofertaProveedorItem', compact('oferta'), compact('properties'));
    }

    public function eliminarOferta($offerId)
    {
        $offer = App\Offer::findOrFail($offerId);
        $deletedOffer = $offer->code;

        //Borrando fotos del disco.

        foreach($offer->items()->get() as $item){
            foreach($item->photos()->get() as $photo){
                error_log($photo->filename);            
                Storage::delete('public/offer_photos/'.$photo->filename);
            }
            $item->delete();
        }

        $offer->delete();
        return back()->with('mensaje', 'Oferta ' . $deletedOffer . ' eliminada.');
    }

    public function comprobarNegocio()
    {

        $proveedor_id = Auth::user()->id;

        //Comprobando que el proveedor tenga un negocio asociado.

        $business = Business::where('user_id', $proveedor_id)->first();
        $business_id = 0;

        if (is_null($business)) {
            error_log('NO HAY NEGOCIO ASOCIADO.');
        } else {
            $business_id = $business['id'];
            error_log('BUSINESS_ID: ' . $business['id']);
        }
        return $business_id;
    }

    public function obtenerOfertaEstado($business_id, $status)
    {
        //Obteniendo ultima oferta con estado 1:edicion
        $offer = Offer::where('business_id', $business_id)->where('offer_status', $status)->first();
        $offer_status = 0;

        if (is_null($offer)) {
            error_log("NO HAY OFERTAS");
        } else {
            $offer_status = $offer['offer_status'];
            error_log("CODIGO OFERTA: " . $offer['code']);
            error_log("ESTADO OFERTA: " . $offer['offer_status']);
        }

        error_log('ACTIVE OFFER: ' . $offer_status);

        return $offer;
    }

    public function generarCodigoOferta($business_id)
    {
        //Obteniendo ultima oferta registrada para generar codigo.

        $max_correlative = $this->obtenerMaximoCorrelativoOferta($business_id) + 1;

        error_log('MAXIMO CORRELATIVO: ' . $max_correlative);

        $date = date("dmY");

        $new_offer_code = 'OP' . $business_id . '-' . $date . '-' . $max_correlative;

        error_log('NEW OFFERT CODE: ' . $new_offer_code);

        return $new_offer_code;
    }

    public function obtenerMaximoCorrelativoOferta($business_id)
    {
        $max_correlative = Offer::where('business_id', $business_id)->max('correlative');

        if (is_null($max_correlative)) {
            $max_correlative = 0;
        }

        return $max_correlative;
    }

    public function definirPropiedadItem($gender, $style, $size, $unit)
    {
        $genders = array("Mujer", "Hombre", "Niño", "Niña");
        $styles = array("Formal", "Casual", "Deportivo", "Urbano");
        $sizes = array("Talla 4", "Talla 5", "Talla 5 1/2", "Talla 6", "Talla 7", "Talla 8", "Talla 9");
        $units = array("Par", "Docena", "Centena");

        $properties = array($genders[$gender], $styles[$style], $sizes[$size], $units[$unit]);

        return $properties;
    }

    public function mostrarPropiedadesItem()
    {
        //Si actualiza estos arreglos actulice los arreglos del metodo definitPropiedadItem()

        $genders = array("Mujer", "Hombre", "Niño", "Niña");
        $styles = array("Formal", "Casual", "Deportivo", "Urbano");
        $sizes = array("Talla 4", "Talla 5", "Talla 5 1/2", "Talla 6", "Talla 7", "Talla 8", "Talla 9");
        $units = array("Par", "Docena", "Centena");

        $properties = array($genders, $styles, $sizes, $units);

        foreach ($properties[1] as $gender) {
            error_log("VALOR ENCONTRADO: " . $gender);
        }



        return $properties;
    }
}
