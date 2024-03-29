<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\vistaProductos;
use Illuminate\Http\Request;
use App\Http\Requests\Productos\StoreRequest;
use App\Models\vista_productos_disponibles;
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
        select('id_producto','codigo_producto','producto','nombre_marca','color','estado','categoria',
        'stock','impresora','fk_impresora')
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
    public function mostrarProductosEntrada()
    {
        $producto = vistaProductos::
        select('id_producto','codigo_producto','producto','nombre_marca','color','estado','categoria',
        'stock','impresora')
        ->orderBy('id_producto','asc')
        ->where('estado','Agotado')
        ->orwhere('estado','Disponible')
        ->get();
        return response()->json([
            "ok" =>true,
            "data" =>$producto
        ]);
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
                $producto->codigo_producto  = $codigo_producto;
                $producto->producto         = strtoupper($request->input('producto'));
                $producto->fk_categoria     = $request->input('fk_categoria');
                $producto->fk_marca         = $request->input('fk_marca');
                $producto->fk_unidad_medida = $request->input('fk_unidad_medida');
                $producto->fk_color         = $request->input('fk_color');
                $producto->fk_impresora     = $request->input('fk_impresora');
                $producto->stock  = 0;
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
    public function mostrarProductosSistema(Producto $producto)
    {
        //Muestra si existe regisro de productos en el sistema
       $producto = vistaProductos::
       select('id_producto','codigo_producto','producto')
       ->get()->count();
       if ($producto == 0) {
        return response()->json([
            "ok" =>true,
            "data" =>$producto,
            "mensaje" =>'No se puede crear una solicitud de entrada porque no existe ningún producto en el sistema'
        ]);
       } else {
        return response()->json([
            "ok" =>true,
            "data"=>$producto
        ]);
       }
    }


    public function vistaProductosDisponibles()
    {
        //Muestra los productos en estado disponibles y agotados para realizar una entrada
        $producto = vista_productos_disponibles::
        select('id_producto','codigo_producto','producto','nombre_marca','unidad_medida','color','categoria')
        ->get();
        return response()->json([
            "ok" =>true,
            "data" =>$producto
        ]);
    }

}
