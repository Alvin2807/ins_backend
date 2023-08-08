<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleAciones extends Model
{
    use HasFactory;

    public    $table        = "ins_detalles_acciones";
    public    $primarykey   = "id_detale_accion";
    protected $fillable     = ['id_detalle_accion','fk_producto','cantidad','estado'];
    public    $incrementing = true;
    public    $timestamps   = false;

    protected $casts = [
        'id_detalle_accion' => 'integer',
        'fk_producto' => 'integer',
        'cantidad' => 'integer',
        'estado' => 'string'
    ];
}
