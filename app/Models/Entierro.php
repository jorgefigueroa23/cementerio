<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entierro extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_difunto',
        'fecha_fallecimiento', 
        'fecha_entierro', 
        'hora_entierro', 
        'contador', 
    ];
}
