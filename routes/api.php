<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MarcasController;
use App\Http\Controllers\Api\ModelosController;
use App\Http\Controllers\Api\ProductosController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('marcas',MarcasController::class);
Route::apiResource('modelos', ModelosController::class);
Route::apiResource('productos', ProductosController::class);