<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Categorias\StoreRequest;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostrar categorias

        $categorias = Categoria::
        select('id_categoria', 'categoria')
        ->orderBy('id_categoria','desc')
        ->get();
        return response()->json([
            "ok"   =>true,
            "data" =>$categorias
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
        //Registrar categorías
        try {
           DB::beginTransaction();
           $nombre_categoria = strtoupper($request->input('categoria'));
           $consulta = Categoria::
           select('id_categoria','categoria')
           ->where('categoria', $nombre_categoria)->count();
           if ($consulta > 0) {
            return response()->json([

                "existe" =>'Ya existe una categoría '.$nombre_categoria
            ]);
           } else {
            $categorias = new Categoria();
            $categorias->categoria    = $nombre_categoria;
            $categorias->usuario_crea = strtoupper($request->input('usuario'));
            $categorias->save();

            DB::commit();
            return response()->json([
                "ok" =>true,
                "data"=>$categorias,
                "exitoso"=>'Se guardo satisfactoriamente'
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
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
