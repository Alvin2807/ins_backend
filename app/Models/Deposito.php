<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    use HasFactory;

    public    $table = "ins_depositos";
    public    $primarykey = "id_deposito";
    protected $fillable = ['id_deposito','deposito','usuario_crea','usuario_modifica','fk_despacho'];
    public    $incrementing = true;
    public    $timestamps = false;

    protected $casts = [
        'id_deposito'   =>'integer',
        'deposito'      =>'string',
        'fk_despacho'   =>'integer'
    ];
}
