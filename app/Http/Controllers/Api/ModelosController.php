<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Modelo;
use App\Models\VistaModelo;
use Illuminate\Http\Request;

class ModelosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostrar modelos y marcas
        $modelos = VistaModelo::
        select('id_modelo','nombre_modelo','fk_marca','nombre_marca')
        ->get();
        return response()->json([
            "ok" => true,
            "data" =>$modelos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Registrar Modelos
    }

    /**
     * Display the specified resource.
     */
    public function show(Modelo $modelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modelo $modelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modelo $modelo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modelo $modelo)
    {
        //
    }
}
