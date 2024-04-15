<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traslados extends Model
{
    use HasFactory;
    protected $table = 'traslados';
    protected $fillable = [
        'cementerio',
        'tipo',
        'acta_defuncion',
    ];
}
