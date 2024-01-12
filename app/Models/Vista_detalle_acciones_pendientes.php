<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vista_detalle_acciones_pendientes extends Model
{
    use HasFactory;

    public    $table = 'vista_detalle_acciones_pendientes';
    protected $fillable = ['id_detalle_accion','fk_accion','fk_producto','categoria','nombre_marca','unidad_medida','color','cantidad_solicitada',
    'cantidad_entrada','cantidad_pendiente','comentario','estado','impresora'];
    protected $casts = 
    [
        'id_detalle_accion' => 'integer',
        'fk_accion' => 'integer',
        'fk_producto' =>'integer',
        'categoria' =>'string',
        'nombre_marca' =>'string',
        'unidad_medida' =>'string',
        'color' =>'string',
        'cantidad_solicitada' =>'integer',
        'cantidad_entrada' =>'integer',
        'cantidad_pendiente' =>'integer',
        'comentario' =>'string',
        'estado' =>'string',
        'impresora'=>'string'
    ];
}
