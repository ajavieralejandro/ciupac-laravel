<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsambleaSeeder extends Seeder
{
    /**
     * Seed the asambleas table with bootstrap data.
     *
     * Idempotente: usa name como clave de unicidad.
     * Depende de LocationSeeder: las localidades deben existir antes.
     * Si la localidad no existe (p.ej. LocationSeeder no corrió), el registro se omite
     * sin lanzar una excepción, para que el seed sea robusto.
     * FK: asambleas.location_id → locations.id (ON DELETE CASCADE)
     */
    public function run()
    {
        $asambleas = [
            [
                'name'        => 'Asamblea Bahía Blanca',
                'description' => 'Asamblea participativa en la costa de Bahía Blanca. Registro de residuos y fauna costera.',
                'location'    => 'Bahía Blanca',
            ],
            [
                'name'        => 'Asamblea Puerto Madryn',
                'description' => 'Asamblea participativa en Puerto Madryn. Monitoreo de playas y calidad del agua.',
                'location'    => 'Puerto Madryn',
            ],
            [
                'name'        => 'Asamblea Viedma',
                'description' => 'Asamblea participativa en Viedma. Relevamiento de costas del río Negro.',
                'location'    => 'Viedma',
            ],
        ];

        foreach ($asambleas as $asamblea) {
            $location = DB::table('locations')->where('name', $asamblea['location'])->first();

            if (! $location) {
                // Localidad no encontrada: omitir sin crash para mantener seed robusto
                continue;
            }

            DB::table('asambleas')->updateOrInsert(
                ['name' => $asamblea['name']],
                [
                    'name'        => $asamblea['name'],
                    'description' => $asamblea['description'],
                    'image_name'  => 'placeholder.svg',
                    'image_path'  => 'images/seed',
                    'location_id' => $location->id,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]
            );
        }
    }
}
