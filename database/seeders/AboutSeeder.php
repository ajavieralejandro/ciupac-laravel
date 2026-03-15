<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Seed the abouts table.
     *
     * Idempotente: siempre mantiene un único registro con id=1.
     * Crítico: $about->body (welcome4 L443) y $about->image_path (L613)
     * crashan con null. DB::table() usado porque About::$fillable=['image_name']
     * no permite mass-assign 'body' ni 'image_path'.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abouts')->updateOrInsert(
            ['id' => 1],
            [
                'body'       => '<p>Somos un equipo interdisciplinario dedicado al monitoreo participativo de ambientes costeros patagónicos. <strong>CIUPAC</strong> (Ciencia Participativa de los Ambientes Costeros) articula ciencia, comunidad y territorio para la gestión sustentable del litoral.</p>',
                'image_name' => 'placeholder.svg',
                'image_path' => 'images/seed',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
