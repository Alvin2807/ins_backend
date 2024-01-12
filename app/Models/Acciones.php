<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acciones extends Model
{
    use HasFactory;

    public $table = "ins_acciones";
    public $primarykey = "id_accion";
    protected $fillable = ['id_accion','incidencia','fk_tipo_accion','fecha_incidencia','fecha_registro','fk_despacho_incidencia','entregado_por','estado','cantidad_total','comentario',
    'fk_despacho_solicitud','fk_despacho_requerido','funcionario_solicitud','no_nota','fecha_nota','num_entrada','fecha_entrada','fecha_confirmacion','funcionario','num_salida','usuario_incidencia',
    'titulo_incidencia','fecha_salida','cantidad_llegada','cantidad_solicitada','cantidad_entregada','tiempo_accion','titulo_nota','funcionario_confirma','ciudad_destino','lugar_destino'
    ];
    public $incrementing = true;
    public $timestamps = false;

    protected $casts = [
        'id_accion'             =>'integer',
        'fk_tipo_accion'        =>'integer',
        'fk_despacho_solicitud' =>'integer',
        'fk_despacho_requerido' =>'integer',
        'funcionario_solicitud' =>'string',
        'no_nota'               =>'string',
        'fecha_nota'            =>'datetime:Y-m-d',
        'fecha_registro'        =>'datetime:Y-m-d',
        'num_entrada'           =>'string',
        'fecha_entrada'         =>'datetime:Y-m-d',
        'fecha_confirmacion'    =>'datetime:Y-m-d',
        'funcionario'           =>'string',
        'num_salida'            =>'string',
        'incidencia'            =>'integer',
        'fecha_incidencia'      =>'datetime:Y-m-d',
        'usuario_incidencia'    =>'string',
        'titulo_incidencia'     =>'string',
        'fk_despacho_incidencia'=>'integer',
        'fecha_salida'          =>'datetime:Y-m-d',
        'comentario'            =>'string',
        'cantidad_solicitada'   =>'integer',
        'cantidad_llegada'      =>'integer',
        'cantidad_pendiente'    =>'integer',
        'cantidad_entregada'    =>'integer',
        'estado'                =>'string',
        'usuario_crea'          =>'string',
        'usuario_modifica'      =>'string',
        'fecha_modifica'        =>'datetime:Y-m-d',
        'tiempo_accion'         =>'integer',
        'titulo_nota'           =>'string',
        'funcionario_confirma'  =>'string',
        'lugar_destino'=>'string',
        'ciudad_destino'=>'string'
    ];

    //Relacion de uno a muchos
    public function AccionesDetalles() {
        return $this->hasMany('App\Models\DetalleAciones');
    }
}
