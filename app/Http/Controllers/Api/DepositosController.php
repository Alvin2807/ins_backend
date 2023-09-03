<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Deposito;
use Illuminate\Http\Request;
use App\Http\Requests\Depositos\StoreRequest;
use Illuminate\Support\Facades\DB;

class DepositosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostrar depositos
        $deposito = Deposito::
        select('id_deposito','deposito')
        ->orderBy('id_deposito','desc')
        ->get();
        return response()->json([
            "ok" =>true,
            "data" =>$deposito
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
           $nombre_deposito = strtoupper($request->input('deposito'));
           $consulta = Deposito::
           select('id_deposito','deposito')
           ->where('deposito', $nombre_deposito)->count();
           if ($consulta > 0 ) {
            return response()->json([
                "existe" =>'Ya existe un deposito '.$nombre_deposito
            ]);
           } else {
            $depositos = new Deposito();
            $depositos->fk_despacho  = $request->input('fk_despacho');
            $depositos->deposito     = strtoupper($request->input('deposito'));
            $depositos->usuario_crea = strtoupper($request->input('usuario'));
            $depositos->save();
            DB::commit();
            return response()->json([
                "ok" =>true,
                "data" =>$depositos,
                "exitoso" =>'Se guardo satisfactoriamente'
            ]);
           }
        } catch (\Exception $error) {
            DB::rollBack();
            return response()->json([
                "ok" =>false,
                "data" =>$error->getMessage(),
                "errorRegistro" => 'Hubo un error consulte con el Administrador del sistema'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Deposito $deposito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deposito $deposito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deposito $deposito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deposito $deposito)
    {
        //
    }
}
