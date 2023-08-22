<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MarcasController;
use App\Http\Controllers\Api\ModelosController;
use App\Http\Controllers\Api\ProductosController;
use App\Http\Controllers\Api\AccionesController;
use App\Http\Controllers\Api\CategoriasController;
use App\Http\Controllers\Api\UsersController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
Route::apiResource('login', UsersController::class);
Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('marcas',MarcasController::class);
    Route::apiResource('modelos', ModelosController::class);
    Route::apiResource('productos', ProductosController::class);
    Route::apiResource('acciones', AccionesController::class);
    Route::apiResource('categorias', CategoriasController::class);
    Route::get('accion/{id_accion}', [AccionesController::class,'acciones_pendientes']);
});

