<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    
    public    $table      = "ins_marcas";
    public    $primarykey = "id_marca";
    protected $fillable = ['id_marca','nombre_marca'];
    public    $timestamps = false;
    public    $incrementing = true;

    protected $casts = [
        'id_marca' => 'integer',
        'nombre_marca' => 'string'
    ];


}
