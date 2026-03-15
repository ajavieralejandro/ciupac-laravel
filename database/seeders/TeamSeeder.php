<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Seed the teams table with bootstrap data.
     *
     * Idempotente: usa email como clave de unicidad (columna unique en la migración).
     * status='1' → truthy, necesario para que PagesController::index los incluya:
     *   Team::all()->where('status')->sortBy('priority')
     * priority define el orden de aparición en la sección equipo.
     * path: campo NOT NULL en migración, se deja vacío (no se usa en welcome4).
     */
    public function run()
    {
        $members = [
            [
                'name'        => 'Dr. Juan Pérez',
                'email'       => 'investigador@ciupac.org',
                'path'        => '',
                'image_name'  => 'placeholder.svg',
                'image_path'  => 'images/seed',
                'description' => 'Investigador Principal. Especialista en ecología costera y ciencia participativa patagónica.',
                'status'      => '1',
                'priority'    => 1,
            ],
            [
                'name'        => 'Lic. María González',
                'email'       => 'coordinadora@ciupac.org',
                'path'        => '',
                'image_name'  => 'placeholder.svg',
                'image_path'  => 'images/seed',
                'description' => 'Coordinadora general del proyecto. Gestión territorial y vinculación comunitaria.',
                'status'      => '1',
                'priority'    => 2,
            ],
            [
                'name'        => 'Lic. Carlos Rodríguez',
                'email'       => 'datos@ciupac.org',
                'path'        => '',
                'image_name'  => 'placeholder.svg',
                'image_path'  => 'images/seed',
                'description' => 'Responsable de datos. Procesamiento y análisis de mediciones costeras.',
                'status'      => '1',
                'priority'    => 3,
            ],
        ];

        foreach ($members as $member) {
            DB::table('teams')->updateOrInsert(
                ['email' => $member['email']],
                array_merge($member, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
