<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaUsurios extends Model
{
    use HasFactory;

    public    $table = 'vista_usuarios';
    protected $fillable = ['id_usuario','usuario','cedula','apellido','nombre','correo','fk_despacho','despacho','rol','password','observacion'];

    protected $casts = [
        'id_usuario' =>'integer',
        'usuario' =>'string',
        'cedula' =>'string',
        'apellido' =>'string',
        'nombre'=>'string',
        'correo' =>'string',
        'fk_despacho' =>'integer',
        'passwod'=>'string',
        'despacho' =>'string',
        'rol' =>'string'
    ];
}
