<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\vistaProductos;
use Illuminate\Http\Request;
use App\Http\Requests\Productos\StoreRequest;
use Illuminate\Support\Facades\DB;
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostrar productos
        $producto = vistaProductos::
        select('id_producto','codigo_producto','producto','nombre_marca','nombre_modelo','color','estado','categoria',
        'stock')
        ->orderBy('id_producto','desc')
        ->get();
        return response()->json([
            "ok" =>true,
            "data" =>$producto
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
        //Registrar productos
        try {
            DB::beginTransaction();
            $codigo_producto = strtoupper($request->input('codigo_producto'));
            $consulta = Producto::
            select('id_producto','codigo_producto')
            ->where('codigo_producto', $codigo_producto)->count();
            if ($consulta > 0) {
               return response()->json([
                "existe" => 'Ya existe un producto con el código '.$codigo_producto
               ]);
            } else {
                $producto = new Producto();
                $producto->codigo_producto = $codigo_producto;
                $producto->producto = strtoupper($request->input('producto'));
                $producto->fk_categoria = $request->input('fk_categoria');
                $producto->fk_marca = $request->input('fk_marca');
                $producto->fk_modelo = $request->input('fk_modelo');
                $producto->fk_disposicion = $request->input('fk_disposicion');
                $producto->fk_color = $request->input('fk_color');
                $producto->stock = 0;
                $producto->estado = 'Agotado';
                $producto->usuario_crea = strtoupper($request->input('usuario'));
                $producto->save();
                DB::commit();
                return response()->json([
                    "ok" =>true,
                    "data" =>$producto,
                    "exitoso" => 'Se guardo satisfactoriamente'
                ]);
            }

           
        } catch (\Exception $error) {
            DB::rollBack();
            return response()->json([
                "ok" =>false,
                "data" =>$error->getMessage(),
                "errorRegistro" => 'Hubo un error consulte con el Administrador del sistema '
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
