<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App;
use App\User;

class UsuarioController extends Controller
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

    public function usuario()
    {
        //$usuarios = App\User::all();
        $usuarios = App\User::paginate(3);
        $roles = App\Role::all();

        return view('usuario/usuario', compact('usuarios'), compact('roles'));
    }

    public function roles()
    {
        $usuarios = App\User::all();
        $usuariosTabla = App\User::paginate(3);
        return view('usuario/usuario', compact('usuarios'));
    }


    public function usuarioProveedor()
    {
        //$usuarios = App\User::all();
        $usuarios = App\User::where('role_id', 6)->paginate(3);
        //$usuarios = array();


        return view('usuario/proveedor', compact('usuarios'));
    }

    public function crearUsuario(Request $request)
    {
        //return $request->all();
        //dd($request->name);

        $request->validate([
            'name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => 'required',
        ]);

        $usuario = new App\User;
        $usuario->name = $request->name;
        $usuario->last_name = $request->last_name;
        $usuario->email = $request->email;

        $usuario->password = Hash::make($request->password);
        $usuario->role_id = $request->role;

        $usuario->save();
        return back()->with('mensaje', 'Usuario registrado.');
    }

    public function editarUsuario($id)
    {
        $usuario = App\User::findOrFail($id);
        $roles = App\Role::all();
        return view('usuario.editarUsuario', compact('usuario'), compact('roles'));
    }

    public function actualizarUsuario(Request $request, $id)
    {

        $request->validate([
            'name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => 'required',
        ]);

        $usuario = App\User::findOrFail($id);

        $usuario->name = $request->name;
        $usuario->last_name = $request->last_name;
        if ($usuario->password <> $request->password) {
            $usuario->password = Hash::make($request->password);
        }
        $usuario->role_id = $request->role;

        $usuario->save();

        return back()->with('mensaje', '¡Actualizado!');
    }

    public function eliminarUsuario($id)
    {
        $usuario = App\User::findOrFail($id);
        $deletedUser = $usuario->email;
        $usuario->delete();
        return back()->with('mensaje', 'Usuario' . $deletedUser . 'eliminado.');
    }

}
