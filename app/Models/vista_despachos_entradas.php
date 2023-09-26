<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vista_despachos_entradas extends Model
{
    use HasFactory;
    public    $table    = 'vista_despachos_entradas';
    protected $fillable = ['id_despacho','fk_provincia','despacho','provincia','estado'];
}
