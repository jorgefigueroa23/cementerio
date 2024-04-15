<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstadoPago;
use App\Models\Detalle_tumba;

class EstadoPagoController extends Controller
{
    
    public function index()
    {
        return view('procesos.estadoPago.index');
    }

    public function datosIndex()
    {
        $datos = EstadoPago::all();
        return response()->json($datos);
    }

    public function datosEstadoPago()
    {
        $estadoPago = EstadoPago::join('detalle_tumbas', 'estado_pagos.id', '=', 'detalle_tumbas.estadoPago_id')
            ->select('detalle_tumbas.*', 'estado_pagos.*')
            ->where('detalle_tumbas.estadoPago_id', '!=', 1)
            ->where('detalle_tumbas.estadoPago_id', '!=', 3)
            ->orWhereNotNull('detalle_tumbas.estadoPago_id')
            ->get();
        return response()->json($estadoPago);
    }
}
