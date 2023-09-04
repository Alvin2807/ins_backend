<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaLocalizaciones extends Model
{
    use HasFactory;

    public    $table = "vista_localizaciones";
    protected $fillable = ['id_localizacion','id_deposito','id_piso','deposito','localizacion'];
    protected $casts = [
        'id_localzacion' =>'integer',
        'id_deposito'    =>'integer',
        'id_piso'        =>'integer',
        'deposito'       =>'string',
        'localizacion'   =>'string'
    ];
}
