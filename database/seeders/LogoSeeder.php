<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogoSeeder extends Seeder
{
    /**
     * Seed the logos table.
     *
     * Idempotente: usa 'name' como clave de unicidad.
     * welcome4 filtra por tipo:
     *   $logos  = Logo::all()->where('type','CP')  → "Instituciones contrapartes"
     *   $logos1 = Logo::all()->where('type','F')   → "Financia"
     *   $logos2 = Logo::all()->where('type','A')   → "Instituciones que acompañan"
     * DB::table() usado porque Logo::$fillable no incluye 'type'.
     *
     * @return void
     */
    public function run()
    {
        $logos = [
            ['name' => 'IADO-CONICET',           'type' => 'CP'],
            ['name' => 'UNS',                     'type' => 'CP'],
            ['name' => 'CONICET',                 'type' => 'F'],
            ['name' => 'Municipalidad BBlanca',   'type' => 'A'],
        ];

        foreach ($logos as $logo) {
            DB::table('logos')->updateOrInsert(
                ['name' => $logo['name']],
                [
                    'name'       => $logo['name'],
                    'image_name' => 'placeholder.svg',
                    'image_path' => 'images/seed',
                    'type'       => $logo['type'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
