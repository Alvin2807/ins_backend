<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acciones extends Model
{
    use HasFactory;

    public $table = "ins_acciones";
    public $primarykey = "id_accion";
    protected $fillable = ['id_accion','incidencia','fk_tipo_accion','fecha_incidencia',
    'fecha_registro','fk_despacho','entregado_por','estado','cantidad_total','comentario'
    ];
    public $incrementing = true;
    public $timestamps = false;

    protected $casts = [
        'id_accion' =>'integer',
        'incidencia' =>'integer',
        'fk_tipo_accion' =>'integer',
        'fecha_incidencia' =>'datetime:Y-m-d',
        'fecha_registro' =>'datetime:Y-m-d',
        'fk_despacho' =>'integer',
        'entregado_por' =>'string',
        'estado' =>'string',
        'cantidad_total' =>'integer','comentario'
    ];
}
