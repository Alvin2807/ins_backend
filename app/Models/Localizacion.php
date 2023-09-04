<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacion extends Model
{
    use HasFactory;

    public    $table      = "ins_localizaciones";
    public    $primarykey = "id_localizacion";
    protected $fillable   = ['id_localizacion','localizacion','fk_deposito','fk_piso','usuario_crea','usuario_modifica'];
    public    $incrementing = true;
    public    $timestamps   = false;

    protected $casts = [
        'id_localizacion' => 'integer',
        'fk_deposito'     => 'integer',
        'fk_piso'         => 'integer',
        'localizacion'    => 'string'

    ];
}
