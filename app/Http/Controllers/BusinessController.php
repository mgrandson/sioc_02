<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class BusinessController extends Controller
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

    public function negocio()
    {
        $negocios = App\Business::all()->where('type', 3);


        return view('proveedor/negocio', compact('negocios'));
    }


}
