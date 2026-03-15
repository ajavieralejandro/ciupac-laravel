<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationSeeder extends Seeder
{
    /**
     * Seed the configurations table.
     *
     * Idempotente: ejecutable más de una vez sin duplicar registros.
     * Siempre mantiene un único registro con id=1.
     * visible=true activa la home pública (gate en PagesController::index).
     */
    public function run()
    {
        DB::table('configurations')->updateOrInsert(
            ['id' => 1],
            [
                'visible'    => true,
                'facebook'   => 'https://www.facebook.com/ciupac',
                'instagram'  => 'https://www.instagram.com/ciupac',
                'email'      => 'contacto@ciupac.org',
                'adress'     => 'Bahía Blanca, Buenos Aires, Argentina',
                'tel'        => '+54 291 000 0000',
                'youtube'    => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
