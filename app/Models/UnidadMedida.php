<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use HasFactory;

    public    $table = "ins_disposicion";
    public    $primarykey = "id_disposicion";
    protected $fillable = ['id_disposicion','disposicion','usuario_crea','usuario_modifica'];
    public    $incrementing = true;
    public    $timestamps = false;
}
