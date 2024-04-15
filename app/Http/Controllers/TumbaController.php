<?php

namespace App\Http\Controllers;

use App\Models\Tumba;
use App\Models\Detalle_tumba;
use App\Models\Seguimiento;
use App\Models\Detalle_entierro;
use App\Models\Obras_adicionales;
use App\Models\EstadoPago;
use App\Models\Entierro;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TumbaController extends Controller
{

    public function index()
    {
        return view('procesos.disponibles.index');
    }

    public function datosIndex()
    {
        $tumbas = Tumba::whereIn('estado', [0, 1])
            ->join('pabellons', 'tumbas.pabellon_id', '=', 'pabellons.id')->get();
        return response()->json($tumbas);
    }

    public function obtenerTumbas($pabellon_id)
    {
        /* $tumbas = Tumba::all()->toArray(); */
        $tumbas = Tumba::where('pabellon_id',$pabellon_id)->get();
        return response()->json($tumbas);
    }

    public function datosTumba($id)
    {
        $tumba = Tumba::select('id', 'numero', 'letra', 'estado', 'contador', 'montoTumba')->where('id', $id)->get();
        return response()->json($tumba);
    }

    public function datosDetalleTumba1($id)
    {
        /* $tumba = Tumba::select('id', 'numero', 'letra', 'estado', 'contador')->where('id', $id)->get();
        return response()->json($tumba); */
        $detalleTumbas = Tumba::join('detalle_tumbas', 'tumbas.id', '=', 'detalle_tumbas.tumba_id')
                      ->join('detalle_entierro', 'tumbas.id', '=', 'detalle_entierro.id_tumba')
                      ->join('entierros', 'detalle_entierro.id_entierro', '=', 'entierros.id')
                      ->select('tumbas.*', 'detalle_tumbas.*', 'detalle_entierro.*', 'entierros.*')
                      ->where('tumbas.id', $id)
                      ->orderBy('detalle_tumbas.id', 'desc')
                      ->first();
        
        return response()->json($detalleTumbas);

    }

    public function datosDetallaEnterrado($id)
    {
        $detalleTumbas = Tumba::join('detalle_tumbas', 'tumbas.id', '=', 'detalle_tumbas.tumba_id')
                      ->join('detalle_entierro', 'tumbas.id', '=', 'detalle_entierro.id_tumba')
                      ->join('entierros', 'detalle_entierro.id_entierro', '=', 'entierros.id')
                      ->select('tumbas.*', 'detalle_tumbas.*', 'detalle_entierro.*', 'entierros.*')
                      ->where('tumbas.id', $id)
                      ->orderBy('detalle_tumbas.id', 'desc')
                      ->first();

        /* $detalleTumbas = Detalle_tumba::where('tumba_id', $id)->get(); */
        return response()->json($detalleTumbas);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Tumba $tumba)
    {
        //
    }

    public function edit(Tumba $tumba)
    {
        //
    }

    public function update(Request $request, $tumba)
    {

        $estado = $request->estadoAdd;
        $estadoInicio = Tumba::where('id', $tumba)->first()->estado;
        $token = Str::random(60);

        if($estadoInicio == '0'){
            $contador = Tumba::where('id', $tumba)->first()->contador;
            $tumbaActualizacion = Tumba::where('id', $tumba)
                ->update(['contador' => $contador+1,
                'oldCodigo' => $request->codigoAdd,
                'estado' => $estado
            ]);

            if($estado = '1' || $estado = '2' || $estado = '3'){

                $contador = Tumba::where('id', $tumba)->first()->contador;

                $dtumba = Detalle_tumba::create([
                    'tumba_id' => $tumba,
                    'obrasAdicionales_id' => $request->obrasAdd,
                    'estadoPago_id' => $request->pagoAdd,
                    'titular' => $request->titularAdd,
                    'contador_detalle' => $contador,
                    'dni' => $request->dniAdd,
                    'celular' => $request->celularAdd,
                    'fecha' => $request->fechaEntAdd,
                    'tipoTraslado' => $request->tipoTrasladoAdd,
                    'cementerioTraslado' => $request->cementerioTrasladoAdd,
                    'token' => $token
                ]);
    
                $entierro = Entierro::create([
                    'nombre_difunto' => $request->difuntoAdd,
                    'fecha_fallecimiento' => $request->fechaFaAdd,
                    'fecha_entierro' => $request->fechaEntAdd,
                    'hora_entierro' => $request->horaEntAdd,
                ]);
    
                $det_entierro = Detalle_entierro::create([
                    'id_entierro' => $entierro->id,
                    'id_tumba' => $tumba,
                    'acta_defuncion' => '',
                    'observacion' => ''
                ]);
            }/* else if($estado = '5'){

            } */

        } else if($estadoInicio = '1' || $estadoInicio = '2'){

            $contador = Tumba::where('id', $tumba)->first()->contador;

            $tumbaActualizacion = Tumba::where('id', $tumba)
            ->update([
                'oldCodigo' => $request->codigoAdd,
                'estado' => $estado
            ]);

            $dtumba = Detalle_tumba::where('id', $tumba)
                ->update([
                'tumba_id' => $tumba,
                'obrasAdicionales_id' => $request->obrasAdd,
                'estadoPago_id' => $request->pagoAdd,
                'contador_detalle' => $contador,
                'titular' => $request->titularAdd,
                'dni' => $request->dniAdd,
                'celular' => $request->celularAdd,
                'fecha' => $request->fechaEntAdd,
                'tipoTraslado' => $request->tipoTrasladoAdd,
                'cementerioTraslado' => $request->cementerioTrasladoAdd,
                'token' => $token
            ]);

            $det_entierro = Detalle_entierro::select('id_entierro')->where('id_tumba', $tumba)
                ->update([
                'acta_defuncion' => '',
                'observacion' => ''
            ]);

            $detalles_actualizados = Detalle_entierro::where('id_tumba', $tumba)->get();

            // Obtener el id_entierro del primer registro (si existen registros actualizados)
            if ($detalles_actualizados->isNotEmpty()) {
                $id_entierro = $detalles_actualizados->first()->id_entierro;
            } else {
                // Manejar el caso en que no se actualicen registros
                $id_entierro = null;
            }


            $entierro = Entierro::where('id', $id_entierro)
                ->update([
                'nombre_difunto' => $request->difuntoAdd,
                'fecha_fallecimiento' => $request->fechaFaAdd,
                'fecha_entierro' => $request->fechaEntAdd,
                'hora_entierro' => $request->horaEntAdd,
            ]);

        } else if($estadoInicio == '3'){

            $contador = Tumba::select('contador')->where('id', $tumba)->first();

                $totalContador = $contador+1;

                $tumbaActualizacion = Tumba::where('id', $tumba)
                    ->update(['contador' => $totalContador,
                    'oldCodigo' => $request->codigoAdd,
                    'estado' => $estado
                ]);

                $dtumba = Detalle_tumba::create([
                    'tumba_id' => $tumba,
                    'obrasAdicionales_id' => $request->obrasAdd,
                    'estadoPago_id' => $request->pagoAdd,
                    'titular' => $request->titularAdd,
                    'contador_detalle' => $contador,
                    'dni' => $request->dniAdd,
                    'celular' => $request->celularAdd,
                    'fecha' => $request->fechaEntAdd, 
                    'tipoTraslado' => $request->tipoTrasladoAdd,
                    'cementerioTraslado' => $request->cementerioTrasladoAdd,
                    'token' => $token
                ]);

                $entierro = Entierro::create([
                    'nombre_difunto' => $request->difuntoAdd,
                    'fecha_fallecimiento' => $request->fechaFaAdd,
                    'fecha_entierro' => $request->fechaEntAdd,
                    'hora_entierro' => $request->horaEntAdd,
                ]);

                $det_entierro = Detalle_entierro::create([
                    'id_entierro' => $entierro->id,
                    'id_tumba' => $tumba,
                    'acta_defuncion' => '',
                    'observacion' => ''
                ]);

                Seguimiento::create([
                    'id_tumba' => $tumba,
                    'id_usuario' => auth()->user()->id,
                    'accion' => 'Entierro',
                    'fecha' => now(),
                    'hora' => now(),
                    'observacion' => 'Entierro de difunto'
                ]);
            }

        return redirect()->route('home');
    }
    

    public function destroy(Tumba $tumba)
    {
        //
    }
}
