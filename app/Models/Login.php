<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    public $table = 'ins_usuarios';
    protected $primarykey = 'id_usuario';
    protected $fillable = ['id_usuario','usuario','cedula','apellido','nombre','correo','fk_despacho','password'];
    public $incrementing = true;
    public $timestamps = false;

    protected $casts = [
        'id_usuario' =>'integer',
        'usuario' =>'string',
        'cedula'=>'string',
        'apellido' =>'string',
        'nombre' =>'string',
        'correo' =>'string',
        'fk_despacho' =>'integer',
        'password'=>'string'
    ];
}
