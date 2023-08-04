<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaModelo extends Model
{
    use HasFactory;

    public    $table = "vista_modelos";
    protected $fillable = ['id_modelo','nombre_modelo','fk_marca','nombre_marca'];

    protected $casts = [
        'id_modelo' => 'integer',
        'nombre_modelo' => 'string',
        'fk_marca' => 'integer',
        'nombre_marca' => 'string'
    ];
}
