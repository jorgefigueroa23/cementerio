<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Obras_adicionales;

class ObrasAddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Obras_adicionales::create([
            'descripcion'=>'NO CUENTA',
            'monto'      =>'00.00',
            'resolucion' =>'Resolución de Alcaldía N° 140-2021.MDP/A',
        ]);

        Obras_adicionales::create([
            'descripcion'=>'TAPIADO DEN NICHO',
            'monto'      =>'70.00',
            'resolucion' =>'Resolución de Alcaldía N° 140-2021.MDP/A',
        ]);

        Obras_adicionales::create([
            'descripcion'=>'PAGO POR CONSTANCIA DE SEPULTURA',
            'monto'      =>'50.00',
            'resolucion' =>'Resolución de Alcaldía N° 140-2021.MDP/A',
        ]);

        Obras_adicionales::create([
            'descripcion'=>'PAGO POR CONSTANCIA DE CANCELACIÓN DE NICHO',
            'monto'      =>'50.00',
            'resolucion' =>'Resolución de Alcaldía N° 140-2021.MDP/A',
        ]);

        Obras_adicionales::create([
            'descripcion'=>'PAGO POR OBRAS ADICIONALES (LAPIDA, MAYOLICA O ALGUNA MODIFICACION)',
            'monto'      =>'50.00',
            'resolucion' =>'Resolución de Alcaldía N° 140-2021.MDP/A',
        ]);
    }
}
