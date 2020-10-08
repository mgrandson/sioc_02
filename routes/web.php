<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/* MODULO DE USUARIOS */
/*Route::get('empleado', function(){
    return view('usuario/empleado');
});*/

Route::get('usuario', 'UsuarioController@usuario')->name('usuario');

Route::get('proveedor', 'UsuarioController@usuarioProveedor')->name('proveedor');

Route::post('/', 'UsuarioController@crearUsuario')->name('usuario.crear');

Route::get('/editar/{id}', 'UsuarioController@editarUsuario')->name('usuario.editar')->where('id', '[0-9]+');

Route::put('/editar/{id}','UsuarioController@actualizarUsuario')->name('usuario.actualizar');

Route::delete('/eliminar/{id}', 'UsuarioController@eliminarUsuario')->name('usuario.eleminar');

/** MODULO DE COMPRAS - PROVEEDORES*/

//LO QUE VERA EL PROVEEDOR
Route::get('oferta/proveedor', 'ofertaProveedorController@ofertaProveedor')->name('ofertaProveedor');
Route::get('oferta/proveedor/item', 'ofertaProveedorController@ofertaProveedorItem')->name('ofertaProveedorItem');

//LO QUE VERA EL GERENTE
Route::get('oferta/tienda', 'ofertaController@ofertaTienda')->name('ofertaTienda');
Route::get('oferta/pedido/tienda', 'ofertaController@pedidoTienda')->name('pedidoTienda');


//Route::get('proveedor', 'NavigationController@proveedor')->name('proveedor');
Route::get('compra', function () {
    return view('compra/oferta');
});

Route::get('mensaje', function () {
    return view('compra/mensaje');
});

/** MODULO DE INVENTARIO */
