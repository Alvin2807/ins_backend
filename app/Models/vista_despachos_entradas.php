<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vista_despachos_entradas extends Model
{
    use HasFactory;
    public    $table    = 'vista_despachos_entradas';
    protected $fillable = ['id_despacho','fk_provincia','despacho','provincia','estado','direccion','appellido_jefe','nombre_jefe','sigla_jefe','profesion_jefe','cargo'];

    protected $casts = 
    [
        'id_despacho' =>'integer',
        'fk_provincia' =>'integer',
        'despacho' =>'string',
        'provincia' =>'string',
        'estado' =>'string',
        'direccion' =>'string'
    ];
}
