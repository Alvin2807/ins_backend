<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use HasFactory;

    public    $table = "ins_unidades_medidas";
    public    $primarykey = "id_unidad_medida";
    protected $fillable = ['id_unidad_medida','unidad_medida','usuario_crea','usuario_modifica'];
    public    $incrementing = true;
    public    $timestamps = false;
}
