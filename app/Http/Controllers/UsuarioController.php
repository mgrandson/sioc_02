<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $this->middleware('auth');
    }
    public function usuario()
    {
        //$usuarios = App\User::all();
        $usuariosTabla = App\User::paginate(3);
        $usuarios = $this->convertirCodigoTexto($usuariosTabla);
        return view('usuario/usuario', compact('usuarios'));
    }

    public function usuarioProveedor()
    {
        //$usuarios = App\User::all();
        $usuariosTabla = App\User::where('user_type', 2)->paginate(3);
        //$usuarios = array();

        $usuarios = $this->convertirCodigoTexto($usuariosTabla);

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
            'job' => 'required',
            'user_type' => 'required',
            'access_level' => 'required'
        ]);

        $usuario = new App\User;
        $usuario->name = $request->name;
        $usuario->last_name = $request->last_name;
        $usuario->email = $request->email;

        $usuario->password = Hash::make($request->password);
        $usuario->job = $request->job;
        $usuario->user_type = $request->user_type;
        $usuario->access_level = $request->access_level;

        $usuario->save();
        return back()->with('mensaje', 'Usuario registrado.');
    }

    public function editarUsuario($id)
    {
        $usuario = App\User::findOrFail($id);
        return view('usuario.editarUsuario', compact('usuario'));
    }

    public function actualizarUsuario(Request $request, $id)
    {

        $request->validate([
            'name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'job' => 'required',
            'user_type' => 'required',
            'access_level' => 'required'
        ]);

        $usuario = App\User::findOrFail($id);

        $usuario->name = $request->name;
        $usuario->last_name = $request->last_name;
        if ($usuario->password <> $request->password) {
            $usuario->password = Hash::make($request->password);
        }
        $usuario->job = $request->job;
        $usuario->user_type = $request->user_type;
        $usuario->access_level = $request->access_level;

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



    public function convertirCodigoTexto($usuarios)
    {
        /*
        2. Administrador
        3. Gerente
        5. Contador
        7. Cajero
        11. Vendedor
        13. Distribuidor*/

        for ($i = 0; $i < count($usuarios); $i++) {
            $u = $usuarios[$i];
            if ($u['job'] == 2) {
                $u['job'] = 'Administrador';
            } elseif ($u['job'] == 3) {
                $u['job'] = 'Gerente';
            } elseif ($u['job'] == 5) {
                $u['job'] = 'Contador';
            } elseif ($u['job'] == 7) {
                $u['job'] = 'Cajero';
            } elseif ($u['job'] == 11) {
                $u['job'] = 'Vendedor';
            } elseif ($u['job'] == 13) {
                $u['job'] = 'Distribuidor';
            } else {
                $u['job'] = 'Indefinido';
            }

            if ($u['user_type'] == 1) {
                $u['user_type'] = 'Empleado';
            } elseif ($u['user_type'] == 2) {
                $u['user_type'] = 'Proveedor';
            } else {
                $u['user_type'] = 'Indefinido';
            }

            /*
            1. Alpha
            2. Beta
            3. Gamma
            4. Delta
            5. Epsilon
            6. Dseta
*/
            if ($u['access_level'] == 1) {
                $u['access_level'] = 'Alpha';
            } elseif ($u['access_level'] == 2) {
                $u['access_level'] = 'Beta';
            }elseif ($u['access_level'] == 3) {
                $u['access_level'] = 'Gamma';
            }elseif ($u['access_level'] == 4) {
                $u['access_level'] = 'Delta';
            }elseif ($u['access_level'] == 5) {
                $u['access_level'] = 'Epsilon';
            }elseif ($u['access_level'] == 6) {
                $u['access_level'] = 'Dseta';
            } else {
                $u['access_level'] = 'Indefinido';
            }

            $usuarios[$i] = $u;
        }

        return $usuarios;
    }
}
