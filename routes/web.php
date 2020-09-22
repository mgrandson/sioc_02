<?php

use Illuminate\Support\Facades\Route;

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

Route::get('empleado', 'NavigationController@empleado')->name('empleado');



Route::get('proveedor', 'NavigationController@proveedor')->name('proveedor');


/** MODULO DE COMPRAS - PROVEEDORES*/

Route::get('compra', function(){
    return view('compra/oferta');
});

Route::get('mensaje', function(){
    return view('compra/mensaje');
});

/** MODULO DE INVENTARIO */

