<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Acciones;
use App\Models\vista_acciones;
use App\Models\vista_detalles_acciones;
use Illuminate\Http\Request;
use App\Http\Requests\Acciones\StoreRequest;
use App\Models\DetalleAciones;
use App\Models\TipoAccion;
use App\Models\Vista_detalle_acciones_pendientes;
use App\Models\Vista_total_acciones_pendiente;
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
        'tipo_accion','despacho','lugar_destino','ciudad_destino')
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
            
            $tipoAccion = strtoupper($request->input('fk_tipo_accion'));
            if ($tipoAccion == 1) {
                $numeroNota = strtoupper($request->input('no_nota'));
                $consulta = Acciones::
                select('id_accion','no_nota')
                ->where('no_nota', $numeroNota)->count();
                if ($consulta > 0) {
                    return response()->json([
                        "existe" => 'La nota '.$numeroNota . ' ya existe'
                    ]); 
                } else {
                    $acciones = new Acciones();
                    $acciones->no_nota = $numeroNota;
                    $acciones->fk_tipo_accion = $request->input('fk_tipo_accion');
                    $acciones->fecha_registro = Carbon::now();
                    $acciones->fecha_nota = Carbon::now();
                    $acciones->fk_despacho_solicitud = $request->input('fk_despacho');
                    $acciones->fk_despacho_requerido = $request->input('fk_despaho_requerido');
                    $acciones->lugar_destino = $request->input('lugar_destino');
                    $acciones->ciudad_destino = $request->input('ciudad_destino');
                    $acciones->comentario = ucfirst($request->input('comentario'));
                    $acciones->funcionario_solicitud = ucwords($request->input('funcionario_solicitud'));
                    $acciones->usuario_crea = strtoupper($request->input('usuario'));
                    $acciones->comentario = ucfirst($request->input('comentario'));
                    $acciones->titulo_nota = ucwords($request->input('titulo_nota'));
                    $acciones->estado = 'Pendiente';
                    $acciones->save();
                    $items    =  $request->input('productos');
                    for ($i=0; $i <count($items) ; $i++) { 
                        $productos = new DetalleAciones();
                        $productos->fk_accion = $acciones->id;
                        $productos->no_item = $items[$i]['no_item'];
                        $productos->fk_producto   = $items[$i]['id_producto'];
                        $productos->cantidad_solicitada = $items[$i]['cantidad'];
                        $productos->cantidad_pendiente  = $productos->cantidad_solicitada -  $productos->cantidad_pendiente;
                        $productos->cantidad_entrada    = 0;
                        $productos->usuario_crea  = $acciones->usuario_crea;
                        $productos->estado        = $acciones->estado;
                        $productos->save();

                        $detalleAcciones = DetalleAciones::
                        where('fk_accion', $acciones->id)
                        ->sum('cantidad_solicitada');
                        $accion = new Acciones();
                        $data['cantidad_solicitada'] =  $detalleAcciones;
                        $data['cantidad_pendiente']  =  $detalleAcciones;
                        $data['cantidad_llegada']    =  $detalleAcciones - $detalleAcciones;
                        $accion = Acciones::where('id_accion', $acciones->id)->update($data);
                    }

                    DB::commit();
                    return response()->json([
                        "ok" =>true,
                        "data" =>$acciones,
                        "exitoso" =>'Se guardo satisfactoriamente'
                    ]);
                }
            } else if ($tipoAccion == 2) {
                # code...
            } else {
                return 'No se reconose este formato';
            }
          
        } catch (\Exception $error) {
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
    public function mostrarDetallesAccionesPendientes(Acciones $acciones, $id_accion)
    {
        //Mostrar la solicitud con sus detalles de productos pendientes
        $acciones = vistaAccionesPendientes::all()
        ->where('id_accion', $id_accion)
        ->where('estado','Pendiente')
        ->first();

        $detalleAccionesPendiente = Vista_detalle_acciones_pendientes::
        select('id_detalle_accion','fk_producto','codigo_producto','producto','categoria','nombre_marca','unidad_medida','color','cantidad_solicitada',
        'cantidad_entrada','cantidad_pendiente','comentario','estado','no_item','impresora')
        ->where('fk_accion', $id_accion)
        ->where('estado', 'Pendiente')
        ->get();

        $acciones->productos = $detalleAccionesPendiente;
        return response()->json([
            "ok" =>true,
            "data"=>$acciones
        ]);
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
        ]);
        
    }

    public function contarAccionesPendientes(Acciones $acciones)
    {
        //Mostrar todas las acciones pendientes por encabezado
        $acciones = vistaAccionesPendientes::all();
        return response()->json([
            "ok" =>true,
            "data" =>$acciones,
            "total"=>count($acciones)
        ]);
        
    }


    /**
     * Update the specified resource in storage.
     */
    public function totalAccionesPendiente()
    {
        $total = Vista_total_acciones_pendiente::all();
        return response()->json([
            "ok" =>true,
            "data" =>$total[0]->count()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function mostrarNotaExiste(Acciones $acciones, Request $request)
    {
        //Muestra si existe un número de nota existente
        $no_nota  = strtoupper($request->input('no_nota'));
        $id_accion = $request->input('id_accion');
        $acciones  = Acciones::
        select('id_accion','no_nota')
        ->where('no_nota', $no_nota)
        ->where('id_accion','<>', $id_accion)
        ->count();
        return response()->json([
            'ok'=>true,
            "data"=>$acciones
        ]);
    }
}
