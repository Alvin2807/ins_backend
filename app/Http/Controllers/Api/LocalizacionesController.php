<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Localizacion;
use App\Models\VistaLocalizaciones;
use Illuminate\Http\Request;
use App\Http\Requests\Localizaciones\StoreRequest;
use Illuminate\Support\Facades\DB;

class LocalizacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostrar localizaciones
        $localizacion = VistaLocalizaciones::all();
        return response()->json([
            "ok" =>true,
            "data" =>$localizacion
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
        //Registrar localizaciones
        try {
          DB::beginTransaction();
          $nombre_localizacion = strtoupper($request->input('localizacion'));
          $consulta = Localizacion::
          select('id_localizacion','localizacion')
          ->where('localizacion', $nombre_localizacion)->count();
          if ($consulta > 0) {
           return response()->json([
            "existeLocalizacion" =>'Ya existe una localizacion '.$nombre_localizacion
           ]);
          } else {
            $localizaciones = new Localizacion();
            $localizaciones->fk_deposito  = $request->input('fk_deposito');
            $localizaciones->fk_piso      = $request->input('fk_piso');
            $localizaciones->localizacion = $nombre_localizacion;
            $localizaciones->usuario_crea = strtoupper($request->input('usuario'));
            $localizaciones->save();
            DB::commit();
            return response()->json([
                "ok" =>true,
                "data"=>$localizaciones,
                "exitoso" =>'Se guardo satisfactoriamente'
            ]);
          }

        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json([
                "ok" =>false,
                "data" =>$th->getMessage(),
                "errorLocalizaciones" =>'Hubo un error consulte con el Administrador del sistema'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Localizacion $localizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Localizacion $localizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Localizacion $localizacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Localizacion $localizacion)
    {
        //
    }
}
