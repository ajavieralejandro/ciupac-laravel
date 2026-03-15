<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortraitSeeder extends Seeder
{
    /**
     * Seed the portraits table.
     *
     * Idempotente: siempre mantiene un único registro con id=1.
     * Crítico: $portrait->image_path/$portrait->title/$portrait->body
     * en welcome4 L152/L163/L165 crashan con null.
     * DB::table() usado porque Portrait no define $fillable (guarded por defecto).
     *
     * @return void
     */
    public function run()
    {
        DB::table('portraits')->updateOrInsert(
            ['id' => 1],
            [
                'title'      => 'Proyecto CIUPAC',
                'body'       => '<p>La <strong>Ciencia Participativa de los Ambientes Costeros</strong> promueve el monitoreo colaborativo de playas, estuarios y costas patagónicas. Ciudadanos y científicos trabajan juntos para generar datos ambientales de calidad.</p>',
                'image_name' => 'placeholder.svg',
                'image_path' => 'images/seed',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
