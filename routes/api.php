<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MarcasController;
use App\Http\Controllers\Api\ModelosController;
use App\Http\Controllers\Api\ProductosController;
use App\Http\Controllers\Api\AccionesController;
use App\Http\Controllers\Api\CategoriasController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\ColoresController;
use App\Http\Controllers\Api\DepositosController;

Route::apiResource('login', UsersController::class);
Route::post('iniciar_sesion', [UsersController::class,'loginIniciar']);

Route::middleware('auth:sanctum')->group(function (){
});
//Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('marcas',MarcasController::class);
    Route::apiResource('modelos', ModelosController::class);
    Route::apiResource('productos', ProductosController::class);
    Route::apiResource('acciones', AccionesController::class);
    Route::apiResource('categorias', CategoriasController::class);
    Route::apiResource('colores', ColoresController::class);
    Route::apiResource('depositos', DepositosController::class);
    Route::get('accion/{id_accion}', [AccionesController::class,'acciones_pendientes']);
    Route::post('logout', [UsersController::class,'logout']);
//});

