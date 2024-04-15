<?php

namespace App\Http\Controllers;

use App\Models\Obras_adicionales;
use Illuminate\Http\Request;

class ObrasAdicionalesController extends Controller
{
    public function index()
    {
        return view('administracion.obrasAdicionales.index');
    }

    public function datosObras()
    {
        $obrasAdd = Obras_adicionales::all();
        return response()->json($obrasAdd);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Obras_adicionales $obras_adicionales)
    {
        //
    }

    public function edit(Obras_adicionales $obras_adicionales)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try{
            Obras_adicionales::where('id', $id)->update([
                'nombre' => $request->nombre,
                'precio' => $request->precio,
                'descripcion' => $request->descripcion,
            ]);
            return redirect()->back()->with('servicios', 'update');
        }catch(\Exception $e){

            return redirect()->back()->with('servicios', 'error');
        }
        
    }

    public function destroy(Obras_adicionales $obras_adicionales, $id)
    {
        try{
            /* $obras_adicionales->delete(); */
            return redirect()->back()->with('servicios', 'delete');
        }catch(\Exception $e){
            return redirect()->back()->with('servicios', 'error');
        }
    }
}
