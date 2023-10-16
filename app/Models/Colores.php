<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colores extends Model
{
    use HasFactory;

    public    $table     = "ins_colores";
    public    $pimarykey = "id_color";
    protected $fillable  = ['id_color','color'];
    public    $incrementing = true;
    public    $timestamps   = false;

    protected $casts = [
        'id_color' => 'integer',
        'color'    => 'string'
    ];
}
