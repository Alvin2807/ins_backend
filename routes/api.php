<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MarcasController;
use App\Http\Controllers\Api\ProductosController;
use App\Http\Controllers\Api\AccionesController;
use App\Http\Controllers\Api\CategoriasController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\ColoresController;
use App\Http\Controllers\Api\DepositosController;
use App\Http\Controllers\Api\DespachosController;
use App\Http\Controllers\Api\PisosController;
use App\Http\Controllers\Api\UnidadesMedidasController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ModelosImpresoraController;
use App\Models\ModeloImpresora;

Route::apiResource('login', UsersController::class);
Route::post('iniciar_sesion', [UsersController::class,'loginIniciar']);

/* Route::middleware('auth:sanctum')->group(function (){
}); */
//Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('marcas',MarcasController::class);
    Route::apiResource('productos', ProductosController::class);
    Route::apiResource('acciones', AccionesController::class);
    Route::apiResource('categorias', CategoriasController::class);
    Route::apiResource('colores', ColoresController::class);
    Route::apiResource('depositos', DepositosController::class);
    Route::apiResource('pisos', PisosController::class);
    Route::apiResource('unidades_de_medidas', UnidadesMedidasController::class);
    Route::put('editar_solicitud_entrada', [AccionesController::class, 'EditarAccion']);
    Route::apiResource('modelos',ModelosImpresoraController::class);
    Route::post('mostrar_nota_existe', [AccionesController::class,'mostrarNotaExiste']);
    Route::get('acciones_pendientes', [AccionesController::class,'mostrarAccionesPendientes']);
    Route::get('verificar_si_existe_producto',[ProductosController::class,'mostrarProductosSistema']);
    Route::get('despachos_disponibles_para_entrada',[DespachosController::class,'mostrarDespachosEntrada']);
    Route::get('vista_productos_disponibles', [ProductosController::class,'vistaProductosDisponibles']);
    Route::get('contar_acciones_pendientes',[AccionesController::class,'contarAccionesPendientes']);
    Route::get('accion/{id_accion}', [AccionesController::class,'acciones_pendientes']);
    Route::get('total_acciones_pendientes', [AccionesController::class,'totalAccionesPendiente']);
    Route::get('mostrar_productos_para_entrada',[ProductosController::class,'mostrarProductosEntrada']);
    Route::get('selectModelos/{id_marca}',[ModelosImpresoraController::class,'mostrarModelosMarca']);
    Route::get('detalle_de_solicitud_pendiente/{id_accion}',[AccionesController::class,'mostrarDetallesAccionesPendientes']);
    Route::post('logout', [UsersController::class,'logout']);
    Route::post('login',[LoginController::class,'login']);
  
//});

