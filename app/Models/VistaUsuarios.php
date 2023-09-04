<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaUsuarios extends Model
{
    use HasFactory;
    public    $table    = "vista_usuarios";
    protected $fillable = ['id','name','email','name','usuario','id_rol','rol','fk_despacho','despacho'];
}
