<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Seed the locations table with Patagonian coastal cities.
     *
     * Idempotente: usa 'name' como clave de unicidad.
     * Debe ejecutarse ANTES de AsambleaSeeder (FK: asambleas.location_id → locations.id).
     * Coordenadas reales para correcta visualización en mapa Leaflet.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            ['name' => 'Bahía Blanca',  'latitude' => -38.7183, 'longitude' => -62.2663],
            ['name' => 'Puerto Madryn', 'latitude' => -42.7692, 'longitude' => -65.0372],
            ['name' => 'Viedma',        'latitude' => -40.8135, 'longitude' => -62.9967],
        ];

        foreach ($locations as $loc) {
            DB::table('locations')->updateOrInsert(
                ['name' => $loc['name']],
                [
                    'name'       => $loc['name'],
                    'latitude'   => $loc['latitude'],
                    'longitude'  => $loc['longitude'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
