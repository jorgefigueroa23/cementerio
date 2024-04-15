<?php

namespace App\Http\Controllers;

use App\Models\Traslados;
use Illuminate\Http\Request;

class TrasladosController extends Controller
{
    public function index()
    {
        return view('procesos.traslados.index');
    }

    public function datosTraslados()
    {
        $traslados = Traslados::all();
        return response()->json($traslados);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Traslados $traslados)
    {
        //
    }

    public function edit(Traslados $traslados)
    {
        //
    }

    public function update(Request $request, Traslados $traslados)
    {
        //
    }

    public function destroy(Traslados $traslados)
    {
        //
    }
}
