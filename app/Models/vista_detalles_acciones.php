<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vista_detalles_acciones extends Model
{
    use HasFactory;

    public     $table    = "vista_detalle_acciones";
    protected  $fillable = ['id_detalle_accion','codigo_producto','producto','categoria','nombre_marca',
   'nombre_modelo','disposicion','color','cantidad'];

   protected $casts = [
    'id_detalle_accion' => 'integer',
    'codigo_producto'   => 'string',
    'producto'          => 'string',
    'categoria'         => 'string',
    'nombre_marca'      => 'string',
    'nombre_modelo'     => 'string',
    'disposicion'       => 'string',
    'color'             => 'string',
    'cantidad'          => 'integer'
   ];
}
