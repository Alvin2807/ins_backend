<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Despacho;
use App\Models\vista_despachos_entradas;
use Illuminate\Http\Request;

class DespachosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function mostrarDespachosEntrada()
    {
        //Mostrar los despachos para realizar una entrada
        $despacho = vista_despachos_entradas::
        select('id_despacho','despacho','provincia','estado','direccion')
        ->get();
        return response()->json([
            "ok" =>true,
            "data" =>$despacho
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Despacho $despacho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Despacho $despacho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Despacho $despacho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Despacho $despacho)
    {
        //
    }
}
