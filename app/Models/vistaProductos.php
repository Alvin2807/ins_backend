<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vistaProductos extends Model
{
    use HasFactory;

    public $table = "vista_productos";
    protected $fillable = ['id_producto','codigo_producto','fk_marca','fk_unidad_medida','fk_color','stock',
    'estado','categoria','nombre_marca','unidad_medida','color'
    ];

    protected $casts = [
        'id_producto'      => 'integer',
        'codigo_producto'  => 'string',
        'fk_categoria'     => 'integer',
        'fk_marca'         => 'integer',
        'fk_unidad_medida' =>'integer',
        'fk_color'         => 'integer',
        'stock'            => 'integer',
        'estado'           => 'string',
        'color'            => 'string',
        'unidad_medida'    => 'string',
        'nombre_marca'     => 'string',
        'categoria'        => 'string'
    ];
}
