<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despacho extends Model
{
    use HasFactory;

    public    $table      = "ins_despachos";
    public    $primarykey = "id_despacho";
    protected $fillable   = ['id_despacho','despacho'];

    protected $casts = [
        'id_despacho' =>'integer',
        'despacho' =>'string'
    ];
}
