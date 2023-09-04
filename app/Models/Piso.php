<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    use HasFactory;

    public $table        = "ins_pisos";
    public $primarykey   = "id_piso";
    protected $fillable  = ['id_piso','piso'];
    public $incrementing = true;
    public $timestamps   = false;

    protected $casts = [
        'id_piso' =>'integer',
        'piso' =>'string'
    ];
}
