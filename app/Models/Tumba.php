<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tumba extends Model
{
    use HasFactory;

    protected $fillable = [
        'pabellon_id',
        'contador',
        'montoTumba',
        'estado',
        'pabellon',
        'lado',
        'letra',
        'numero',
        'oldCodigo',
        'fecha',
        'token',
    ];
}
