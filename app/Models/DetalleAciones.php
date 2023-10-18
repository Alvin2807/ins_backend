<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleAciones extends Model
{
    use HasFactory;

    public    $table        = "ins_detalle_acciones";
    public    $primarykey   = "id_detalle_accion";
    protected $fillable     = ['id_detalle_accion','fk_producto','estado','cantidad_solicitada','cantidad_entrada','cantidad_pendiente',
    'cantidad_entregada','comentario','usuario_crea','usuario_modifica','fk_accion'];
    public    $incrementing = true;
    public    $timestamps   = false;

    protected $casts = [
        'id_detalle_accion'    => 'integer',
        'fk_producto'          => 'integer',
        'cantidad_solicitada'  => 'integer',
        'estado'               => 'string',
        'fk_accion'            => 'integer',
        'cantidad_entrada'     => 'integer',
        'cantidad_pendiente'   => 'integer',
        'cantidad_entregada'   => 'integer',
        'comentario'           => 'string',
        'estado'               => 'string',
    ];


    //Relacion de unoa muchos inversa
    public function detalleUnaAccion(){
        return $this->belongsTo('App\Models\Acciones');
    }
}
