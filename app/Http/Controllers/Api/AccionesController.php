<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Acciones;
use App\Models\vista_acciones;
use App\Models\vista_detalles_acciones;
use Illuminate\Http\Request;
use App\Http\Requests\Acciones\StoreRequest;
use App\Models\DetalleAciones;
use App\Models\vistaAccionesPendientes;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostrar las solicitudes de acciones 
        $acciones = vista_acciones::all();
        return response()->json([
            "ok" =>true,
            "data" =>$acciones
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function acciones_pendientes($id_accion)
    {
        //Mostrar las solicitudes de acciones pendientes
        $acciones = vista_acciones::
        select('id_accion','incidencia','fecha_incidencia','fecha_registro','entregado_por','estado','cantidad_total',
        'tipo_accion','despacho')
        ->where('estado','Pendiente')
        ->where('id_accion',$id_accion)
        ->first();

        $detalles = vista_detalles_acciones::
        select('id_detalle_accion','fk_producto','fk_accion','cantidad','estado','codigo_producto','producto',
        'categoria','nombre_marca','nombre_modelo','disposicion','color')
        ->where('fk_accion', $id_accion)
        ->where('estado','Pendiente')
        ->get();

        $acciones->vista_acciones = $detalles;
        return response()->json([
            "ok" =>true,
            "data" =>$acciones
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //Registrar acciones
        try {
            DB::beginTransaction();
            $incidencia = strtoupper($request->input('incidencia'));
            $consulta = Acciones::
            select('id_incidencia','incidencia')
            ->where('incidencia', $incidencia)->count();
            if ($consulta > 0) {
                return response()->json([
                    "ok" =>true,
                    "existe" => 'Ya existe el número de incidencia '.$incidencia
                   ]);
            } else {
                $incidencia = strtoupper($request->input('incidencia'));
                $acciones = new Acciones();
                $fecha_incidencia           =  $request->input('fecha_incidencia');
                $acciones->incidencia       =  $incidencia;
                $acciones->fk_tipo_accion   = strtoupper($request->input('fk_tipo_accion'));
                $acciones->fecha_incidencia = Carbon::createFromFormat('Y-m-d', $fecha_incidencia);
                $acciones->fecha_registro   = Carbon::now();
                $acciones->fk_despacho      = strtoupper($request->input('fk_despacho'));
                $acciones->entregado_por    = ucwords($request->input('entregado_por'));
                $acciones->estado           = 'Pendiente';
                $acciones->cantidad_total   = 1;
                $acciones->usuario_crea     = strtoupper($request->input('usuario'));
                $acciones->comentario       = ucfirst($request->input('comentario'));
                $acciones->save();

                $items    = $request->input('detalles');
                $detalles = new DetalleAciones();
                for ($i=0; $i <count($items) ; $i++) { 
                    $detalles->fk_accion    = $acciones->id;
                    $detalles->fk_producto  = $items[$i]['fk_producto'];
                    $detalles->cantidad     = $items[$i]['cantidad'];
                    $detalles->estado       = $acciones->estado;
                    $detalles->usuario_crea = $acciones->usuario_crea;
                    $detalles->save();
                    DB::commit();
                    return response()->json([
                        "ok" =>true,
                        "data" =>$acciones,
                        "exitoso" => 'Se guardo satisfactoriamente',
                    ]);
                }
            }
            
          
        } catch (\Exception $error) {
            return response()->json([
                "ok" =>false,
                "data" =>$error->getMessage(),
                "error" =>'Hubo un error consulte con el Administrador del sistema'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Acciones $acciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function mostrarAccionesPendientes()
    {
        //Mostrar todas las acciones pendientes por encabezado
        $acciones = vistaAccionesPendientes::all();
        return response()->json([
            "ok" =>true,
            "data" =>$acciones,
            "total_acciones" =>$acciones->count()
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acciones $acciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acciones $acciones)
    {
        //
    }
}
