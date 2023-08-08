<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vista_acciones extends Model
{
    use HasFactory;

    public    $table = "vista_acciones";
    protected $fillable = ['id_accion','incidencia','fk_tipo_accion','fecha_incidencia','fecha_registro',
    'fk_despacho','entregado_por','estado','cantidad_total','id_tipo_accion','tipo_accion','despacho'];

    protected $casts = [
        'id_accion'  =>'integer',
        'incidencia' =>'integer',
        'fk_tipo_accion' =>'integer',
        'fecha_incidencia' =>'datetime:Y-m-d',
        'fecha_registro' =>'datetime:Y-m-d',
        'fk_despacho' =>'integer',
        'entregado_por' =>'string',
        'estado' =>'string',
        'cantidad_total' =>'integer',
        'tipo_accion' =>'string',
        'despacho' => 'string'
    ];
}
                  