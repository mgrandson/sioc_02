<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Photo;

class PhotoController extends Controller
{

    public function __construct()
    {
        $this->middleware('provider');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Photo::all();
        return view('proveedor/foto', compact('data'));
    }

    public function storage(Request $request)
    {
        $data = null;

        error_log("SOLICITUD RECIBIDA: \n\n");
        error_log($request);
        error_log("----------------------------\n");

        foreach ($request->file as $file) {
            $imageName = $file->getClientOriginalName();

            error_log("ID ITEM: " . $request->itemId);
            error_log("ID OFERTA: " . $request->offerId);
            error_log("IMAGE NAME: " . $imageName);

            $path = $file->storeAs('public/offer_photos', $imageName);

            //$file->move(public_path() . '/offer_photos/', $imageName);
            //$data = ['error' => '/offer_photos/', $imageName];

            error_log("PATH: ".$path);
            $data = ['uploaded' => 'OK'];
            $photo = new Photo;
            $photo->item_id = $request->itemId;
            $photo->filename = $imageName;
            $photo->path = "storage/offer_photos/".$imageName;
            $photo->save();
        }

        //TEST
        $photos = Photo::where('item_id', $request->itemId)->get();

        if (!is_null($photos)) {
            foreach ($photos as $p) {
                error_log("RECUPERADO ITEM ID: " . $p->item_id . " NOMBRE: " . $p->filename);
            }
        } else {
            error_log("NINGUN DATO.");
        }

        //END TEST

        return response()->json($data);
    }

    public function deleteImage(Request $request){

        error_log("DELETED IMAGEN METHOD\n\n");
        error_log("FILE TO DELETE: ".$request."\n\n");
        error_log("FILE TO DELETE: ".$request->key."\n\n");
        error_log("--------------------------------\n\n");

        $url = Storage::url('offer_photos/calarmado.png');

        error_log("STORAGE PATH: ".$url);

        $photo = Photo::findOrFail($request->key);

        error_log("DATO ENCONTRADO: ".$photo->path);

        Storage::delete('public/offer_photos/'.$photo->filename);
        $photo->delete();

        //$data = ['error' => 'false'];
        $data = ['error:false'];
        return response()->json($data);
    }
}
