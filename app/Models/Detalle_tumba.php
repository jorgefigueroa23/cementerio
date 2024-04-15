<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_tumba extends Model
{
    use HasFactory;
    protected $fillable = [
        'tumba_id',
        'obrasAdicionales_id',
        'estadoPago_id',
        'titular',
        'dni',
        'celular',
        'fecha',
        'observacion',
        'tipoTraslado',
        'cementerioTraslado',
        'token',
    ];
}
