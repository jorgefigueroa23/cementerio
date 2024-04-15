<?php

namespace App\Http\Controllers;

use App\Models\Entierro;
use App\Models\Detalle_entierro;
use App\Models\Tumba;
use Illuminate\Http\Request;

class EntierroController extends Controller
{

    public function index()
    {
        return view('procesos.enterrados.index');
    }

    public function datosEntierro()
    {
        $entierros = Tumba::join('detalle_entierro', 'tumbas.id', '=', 'detalle_entierro.id_tumba')
        ->join('entierros', 'detalle_entierro.id_entierro', '=', 'entierros.id')
        ->select('tumbas.*', 'detalle_entierro.*', 'entierros.*')
        ->where('estado', 3)
        ->get();

        return response()->json($entierros);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Entierro $entierro)
    {
        //
    }

    public function edit(Entierro $entierro)
    {
        //
    }

    public function update(Request $request, Entierro $entierro)
    {
        //
    }

    public function destroy(Entierro $entierro)
    {
        //
    }
}
