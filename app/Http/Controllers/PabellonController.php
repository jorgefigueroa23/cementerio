<?php

namespace App\Http\Controllers;

use App\Models\Pabellon;
use App\Models\Obras_adicionales;
use App\Models\EstadoPago;
use App\Models\Tumba;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PabellonController extends Controller
{

    public function index()
    {
        $pabellones = Pabellon::all();
        return view('administracion.pabellon.index', compact('pabellones'));
    }

    public function filasYcolumnas($id)
    {
        $pabellon = Pabellon::select('cant_columnas','cant_filas')->where('id', $id)->get();
        $cant_columnas = $pabellon[0]->cant_columnas;
        $cant_filas = $pabellon[0]->cant_filas;
        return response()->json(['cant_columnas' => $cant_columnas, 'cant_filas' => $cant_filas]);
    }

    public function selectPabellon()
    {
        $pabellon = Pabellon::all();
        return response()->json($pabellon);
    }

    public function selectObrasAdd()
    {
        $obrasAdd = Obras_adicionales::all();
        return response()->json($obrasAdd);
    }

    public function selectpagoAdd()
    {
        $pagoAdd = EstadoPago::all();
        return response()->json($pagoAdd);
    }

    public function create()
    {
        return view('administracion.pabellon.pabellonCreate');
    }

    public function store(Request $request)
    {
        $pabellon = new Pabellon();
        $pabellon->nombre = $request->nameCreate;
        $pabellon->cant_columnas = $request->columnasCreate;
        $pabellon->cant_filas = $request->filasCreate;
        $pabellon->save();

        $idPabellon = Pabellon::select('id')->where('nombre', $request->nameCreate)->get();
        
        for ($i=1; $i <= $request->filasCreate; $i++) { 
            for ($j=1; $j <= $request->columnasCreate; $j++) {
                if ($i <= 3){
                    $tumba = new Tumba();
                    $tumba->contador = '1';
                    $tumba->estado = '0';
                    $tumba->montoTumba = '3270.00';
                    $tumba->pabellon_id = $idPabellon[0]->id;
                    $tumba->letra = $i;
                    $tumba->numero = $j;
                    $tumba->save();
                
                }else{
                    $tumba = new Tumba();
                    $tumba->contador = '1';
                    $tumba->estado = '0';
                    $tumba->montoTumba = '2870.00';
                    $tumba->pabellon_id = $idPabellon[0]->id;
                    $tumba->letra = $i;
                    $tumba->numero = $j;
                    $tumba->save();
                }
            }
        }

        /* var_dump($tumba); */
        /* var_dump($idPabellon); */
        return redirect()->route('pabellones');
    }

    public function show(Pabellon $pabellon)
    {
        //
    }

    public function edit(Pabellon $pabellon)
    {
        return view('administracion.pabellon.pabellonEdit');
    }

    public function update(Request $request, $id)
    {
        
        try{
            Pabellon::where('id', $id)
                ->update(['nombre' => $request->nombrePabellon,
            ]);
            return redirect()->back()->with('user', 'update');
        }catch(\Exception $e){
            return redirect()->back()->with('user', 'error');
        }
    }
    
    public function destroy(Pabellon $pabellon)
    {
        try{
            $pabellon = Pabellon::find($id);
            $pabellon->delete();
            return redirect()->back()->with('user', 'delete');
        }catch(\Exception $e){
            return redirect()->back()->with('user', 'error');
        }
    }
}
