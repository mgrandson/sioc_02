<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class NavigationController extends Controller
{

      /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function empleado(){
        $usuarios = App\User::all();
        return view('usuario/empleado', compact('usuarios'));
    }

    public function proveedor(){
        return view('usuario/proveedor');
    }
}
