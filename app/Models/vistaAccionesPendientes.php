<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vistaAccionesPendientes extends Model
{
    use HasFactory;
    public $table = "vista_acciones_pendientes";
    protected $fillable = ['id_accion','fk_tipo_accion','incidencia','fecha_incidencia','fecha_registro','fk_despacho','entregado_por',
    'estado','cantidad_total','comentario','num_entrada','num_salida','fecha_entrada','fecha_salida','fecha_confirmacion','tipo_accion',
    'despacho'];
    protected $casts   = [
        'id_accion'          => 'integer',
        'fk_tipo_accion'     => 'integer',
        'incidencia'         => 'integer',
        'fecha_incidencia'   =>'datetime:Y-m-d',
        'fecha_registro'     =>'datetime:Y-m-d',
        'fk_despacho'        =>'integer',
        'entregado_por'      =>'string',
        'estado'             =>'string',
        'cantidad_total'     =>'integer',
        'comentario'         =>'string',
        'num_entrada'        =>'string',
        'num_salida'         =>'string',
        'fecha_entrada'      =>'datetime:Y-m-d',
        'fecha_salida'       =>'datetime:Y-m-d',
        'fecha_confirmacion' =>'datetime:Y-m-d',
        'tipo_accion'        =>'string',
        'despacho'           =>'string'

    ];

}
