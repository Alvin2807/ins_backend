<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vista_productos_disponibles extends Model
{
    use HasFactory;
    public     $table = "vista_productos_disponibles";
    protected  $fillable = ['id_producto','codigo_producto','producto','categoria','nombre_marca',
    'unidad_medida','color','estado','stock'];
    protected  $casts = [
        'id_producto'     => 'integer',
        'codigo_producto' => 'string',
        'producto'        => 'string',
        'categoria'       =>'string',
        'nombre_marca'    =>'string',
        'color'           =>'string',
        'estado'          =>'string',
        'stock'           =>'integer',
        'unidad_medida'   =>'string'
    ];
}
