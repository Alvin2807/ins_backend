<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeloImpresora extends Model
{
    use HasFactory;

    public    $table         = 'ins_modelo_impresora';
    protected $primarykey    = 'id_impresora';
    protected $fillable      = ['id_impresora','fk_marca','impresora'];
    public    $incrementing  = true;
    public    $timestamps    = false;

    protected $casts =
    [
        'id_impresora' =>'integer',
        'fk_marca'     =>'integer',
        'impresora'    =>'string'
    ];
    

}
