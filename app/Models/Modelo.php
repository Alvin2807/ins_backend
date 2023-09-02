<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    public $table         = "ins_modelos";
    public $primarykey    = "id_modelo";
    protected $fillable   = ['id_modelo','nombre_modelo','fk_marca','usuario_crea','usuario_modifica'];
    public $incrementing  = true;
    public $timestamps    = false;

    protected $casts = [
        'id_modelo'     => 'integer',
        'nombre_modelo' => 'string',
        'fk_marca'      => 'integer',
    ];
}
