<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\EstadoPago;

class EstadoPagoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        EstadoPago::create([
            'descripcion'=>'CONTADO',
        ]);

        EstadoPago::create([
            'descripcion'=>'FRACCIONADO EN 2 CUOTAS',
        ]);

        EstadoPago::create([
            'descripcion'=>'FRACCIONADO EN 3 CUOTAS',
        ]);

        EstadoPago::create([
            'descripcion'=>'FRACCIONADO EN 4 CUOTAS',
        ]);

        EstadoPago::create([
            'descripcion'=>'CANCELADO',
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
