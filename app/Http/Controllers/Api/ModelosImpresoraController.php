<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ModeloImpresora;
use Illuminate\Http\Request;
use App\Http\Requests\Modelos\StoreRequest;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class ModelosImpresoraController extends Controller
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
            $fk_marca  = $request->input('id_marca');
            $usuario   = strtoupper($request->input('usuario'));
            $item      = $request->input('modelos');

            for ($i=0; $i <count($item) ; $i++) { 
                $impresora = strtoupper($item[$i]['impresora']);
                $validar = ModeloImpresora::where('impresora', $impresora)->count();
                if ($validar) {
                    return 
                    [
                        "ok" =>true,
                        "existeModelo" =>'Ya existe el modelo de impresora '.$impresora
                    ];
                } else {
                    for ($i=0; $i <count($item) ; $i++) { 
                        $modelos = new ModeloImpresora();
                        $modelos->impresora = strtoupper($item[$i]['impresora']);
                        $modelos->fk_marca = $fk_marca;
                        $modelos->usuario_crea = $usuario;
                        $modelos->save();
                    }

                    DB::commit();
                    return response()->json([
                        "ok" =>true,
                        "data"=>$modelos,
                        "exitoso"=>'Se guardo satisfactoriamente'
                    ]);
                }

            }
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json([
                "ok" =>false,
                "data" =>$th->getMessage(),
                "errorModelo" =>'Hubo un error consulte con el Administrador del sistema.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function mostrarModelosMarca(ModeloImpresora $modeloImpresora, $id_marca)
    {
        //Selecionar la marca y mostrar los modelos
        $modeloImpresora = ModeloImpresora::
        select('id_impresora','impresora','fk_marca')
        ->where('fk_marca', [$id_marca])
        ->orderBy('impresora', 'asc')
        ->get();
        return response()->json([
            "ok" =>true,
            "data" =>$modeloImpresora
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModeloImpresora $modeloImpresora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModeloImpresora $modeloImpresora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModeloImpresora $modeloImpresora)
    {
        //
    }
}
