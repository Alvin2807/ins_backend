<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public    $table       = "ins_productos";
    public    $primarykey  = "id_producto";
    protected $fillable   = ['id_producto','codigo_producto','producto','fk_categoria','fk_marca','fk_modelo',
    'fk_disposicion','fk_color','stock','estado','fk_impresora'
    ];
    public $incrementing = true;
    public $timestamps = false;

    protected $casts  = [
        'id_producto' => 'integer',
        'codigo_producto' => 'string',
        'fk_categoria' => 'integer',
        'fk_marca' => 'integer',
        'fk_modelo' => 'integer',
        'fk_disposicion' =>'integer',
        'fk_color' => 'integer',
        'stock' => 'integer',
        'estado' => 'string',
        'fk_impresora'=>'integer'
    ];

    
}
