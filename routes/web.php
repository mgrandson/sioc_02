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

Route::get('proveedor/negocio', 'BusinessController@negocio')->name('negocio');

Route::post('/', 'UsuarioController@crearUsuario')->name('usuario.crear');

Route::get('/editar/{id}', 'UsuarioController@editarUsuario')->name('usuario.editar')->where('id', '[0-9]+');

Route::put('/editar/{id}','UsuarioController@actualizarUsuario')->name('usuario.actualizar');

Route::delete('/eliminar/{id}', 'UsuarioController@eliminarUsuario')->name('usuario.eliminar');

/** MODULO DE COMPRAS - PROVEEDORES*/

//LO QUE VERA EL PROVEEDOR
Route::get('proveedor/oferta', 'OfertaProveedorController@ofertaProveedor')->name('ofertaProveedor');
Route::post('proveedor/oferta/add/', 'OfertaProveedorController@crearOferta')->name('ofertaProveedor.crearOferta');
Route::post('proveedor/oferta/item/add', 'OfertaProveedorController@crearItem')->name('ofertaProveedor.crearItem');

Route::get('proveedor/oferta/editar/{offerId}', 'OfertaProveedorController@editarOferta')->name('oferta.editar')->where('offerId', '[0-9]+');
Route::delete('proveedor/oferta/eliminar/{offerId}', 'OfertaProveedorController@eliminarOferta')->name('oferta.eliminar');

Route::get('proveedor/oferta/item/editar/{offerId}/{itemId}', 'OfertaProveedorController@editarItem')->name('item.editar')->where('offerId', '[0-9]+')->where('itemId', '[0-9]+');
Route::delete('proveedor/oferta/item/eliminar/{offerId}/{itemId}', 'OfertaProveedorController@eliminarItem')->name('item.eliminar');



//Rutas para las fotografias.
Route::get('proveedor/oferta/foto', 'PhotoController@index')->name('foto');
Route::post('image-submit', 'PhotoController@storage');
Route::delete('image-delete', 'PhotoController@deleteImage');


//LO QUE VERA EL GERENTE
Route::get('tienda/oferta', 'OfertaController@ofertaTienda')->name('ofertaTienda');
Route::get('tienda/oferta/{offerId}', 'OfertaController@verOfertaTienda')->name('verOfertaTienda')->where('offerId', '[0-9]+');
Route::get('tienda/oferta/item/{offerId}/{itemId}', 'OfertaController@verItemOfertaTienda')->name('verItemOfertaTienda')->where('offerId', '[0-9]+')->where('itemId', '[0-9]+');
Route::get('oferta/pedido/tienda', 'OfertaController@pedidoTienda')->name('pedidoTienda');


//Route::get('proveedor', 'NavigationController@proveedor')->name('proveedor');
Route::get('compra', function () {
    return view('compra/oferta');
});

Route::get('mensaje', function () {
    return view('compra/mensaje');
});

/** MODULO DE INVENTARIO */
