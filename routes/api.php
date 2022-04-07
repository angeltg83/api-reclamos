<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntidadBancariaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\SolicitudReclamoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('bancos', [EntidadBancariaController::class, 'index']);
Route::get('bancos/{id}', [EntidadBancariaController::class, 'show']);

Route::get('persona/tiposPersonas', [PersonaController::class, 'getTipoPersona']);
Route::get('persona/paises', [PersonaController::class, 'getPais']);

Route::get('persona/tiposIdentificacion', [PersonaController::class, 'getTipoIdentificacion']);
Route::get('persona/tipoIdentificacion/{id}', [PersonaController::class, 'getTipoIdentificacionID']);

Route::get('producto/tiposProductos', [ProductoController::class, 'getTipoProducto']);
//Route::get('producto/tipoProducto/', [ProductoController::class, 'getProductoID']);

Route::get('solicitud/reclamos/tiposEstados', [SolicitudReclamoController::class, 'getEstados']);
Route::get('solicitud/reclamos/motivos', [SolicitudReclamoController::class, 'getMotivo']);

Route::get('solicitud/reclamos/tiposSolicitudes', [SolicitudReclamoController::class, 'getTiposSolicitudes']);
Route::get('solicitud/reclamos/Origenes', [SolicitudReclamoController::class, 'getOrigenes']);
Route::get('solicitud/reclamos/Origen/{id}', [SolicitudReclamoController::class, 'getOrigenID']);

//Insert a new solicitud
Route::post('solicitud/reclamos/insert', [SolicitudReclamoController::class, 'store']);

//Send email.
Route::get('send/mail/test', [SendMailController::class, 'send']);
Route::post('send/mail/sendmailSolicitud', [SolicitudReclamoController::class, 'sendmailSolicitud']);
