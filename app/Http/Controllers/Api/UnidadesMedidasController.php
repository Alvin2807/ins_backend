<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UnidadMedia\StoreRequest;

class UnidadesMedidasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostrar las unidades de medidas
        $unidadMedida = UnidadMedida::
        select('id_unidad_medida','unidad_medida')
        ->orderBy('id_unidad_medida','desc')
        ->get();
        return response()->json([
            "ok" =>true,
            "data" =>$unidadMedida
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
        //Registrar unidad de medida
        try {
          DB::beginTransaction();
          $unidad_medida = strtoupper($request->input('unidad_medida'));
          $consulta = UnidadMedida::
          select('id_unidad_medida','unidad_medida')
          ->where('unidad_medida', $unidad_medida)->count();
          if ($consulta > 0) {
           return response()->json([
            "existe" =>'Ya existe la unidad de medida '.$unidad_medida
           ]);
          } else {
            $medidas = new UnidadMedida();
            $medidas->disposicion  = $unidad_medida;
            $medidas->usuario_crea = strtoupper($request->input('usuario'));
            $medidas->save();
            DB::commit();
            return response()->json([
                "ok" =>true,
                "data" =>$medidas,
                "exitoso" => 'Se guardo satisfactoriamente'
            ]);
          }
         
        } catch (\Exception $th) {
           DB::rollBack();
           return response()->json([
            "ok" =>false,
            "data" =>$th->getMessage(),
            "errorRegistro" =>'Hubo un error consulte con el Administrador del sistema'
           ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UnidadMedida $unidadMedida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnidadMedida $unidadMedida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnidadMedida $unidadMedida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnidadMedida $unidadMedida)
    {
        //
    }
}
