<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obras_adicionales extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'monto',
        'resolucion',
    ];
}
