<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Http\Request;
use App\Http\Requests\Marcas\StoreRequest;
use Illuminate\Support\Facades\DB;
class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostrar marcas
        $marcas = Marca::
        select('id_marca','nombre_marca')
        ->orderby('id_marca', 'desc')
        ->get();
        return response()->json([
            "ok"   =>true,
            "data" =>$marcas
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
    public function store(StoreRequest $request)
    {
       try {
        DB::beginTransaction();
        $marca = strtoupper($request->input('nombre_marca'));
        $consulta = Marca::
        select('id_marca','nombre_marca')
        ->where('nombre_marca', $marca)->count();
        if ($consulta > 0) {
           return response()->json([
            "existe" =>'Ya existe una marca '.$marca
           ]);
        } else {
            $marcas = new Marca();
            $marcas->nombre_marca = $marca;
            $marcas->usuario_crea = strtoupper($request->input('usuario'));
            $marcas->save();
            DB::commit();
            return response()->json([
                "ok" =>true,
                "data" =>$marcas,
                "exitoso" =>'Se guardo satisfactoriamente'
            ]);
        }
       } catch (\Exception $error) {
        DB::rollBack();
        return response()->json([
            "ok" =>false,
            "data" =>$error->getMessage(),
            "errorRegistro" =>'Hubo un error consulte con el Administrador del sistema'
        ]);
       }
      
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        //
    }
}
