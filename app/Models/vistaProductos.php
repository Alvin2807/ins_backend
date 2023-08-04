<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vistaProductos extends Model
{
    use HasFactory;

    public $table = "vista_productos";
    protected $fillable = ['id_producto','codigo_producto','fk_marca','fk_modelo','fk_disposicion','fk_color','stock',
    'estado','categoria','nombre_marca','nombre_modelo','disposicion','color'
    ];

    protected $casts = [
        'id_producto' => 'integer',
        'codigo_producto' => 'string',
        'fk_categoria' => 'integer',
        'fk_marca' => 'integer',
        'fk_modelo' => 'integer',
        'fk_disposicion' =>'integer',
        'fk_color' => 'integer',
        'stock' => 'integer',
        'estado' => 'string',
        'color' => 'string',
        'disposicion' => 'string',
        'nombre_marca' => 'string',
        'nombre_modelo' => 'string',
        'categoria' => 'string'
    ];
}
