<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_entierro extends Model
{
    use HasFactory;
    protected $table = 'detalle_entierro';
    protected $fillable = [
        'id_entierro',
        'id_tumba',
        'acta_defuncion',
        'observacion',
    ];
}
