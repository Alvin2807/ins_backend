<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaDeposito extends Model
{
    use HasFactory;

    public    $table    = 'vista_depositos';
    protected $fillable = ['id_deposito','deposito','fk_piso','despacho','piso'];

    protected $casts = 
    [
        'id_deposito' => 'integer',
        'deposito'    => 'string',
        'fk_piso'     =>'integer',
        'despacho'    =>'string',
        'piso'        =>'string'
    ];
}
