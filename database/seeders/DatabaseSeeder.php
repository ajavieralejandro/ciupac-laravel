<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Orden de ejecución:
     *   1. LocationSeeder     — sin dependencias; AsambleaSeeder la necesita
     *   2. AboutSeeder        — CRÍTICO: evita crash en welcome4 (L443, L613)
     *   3. PortraitSeeder     — CRÍTICO: evita crash en welcome4 (L152)
     *   4. LogoSeeder         — deseable: secciones CP / F / A
     *   5. TeamSeeder         — deseable: sección equipo
     *   6. PostSeeder         — deseable: sección noticias
     *   7. AsambleaSeeder     — deseable: mapa + lista (depende de Location)
     *   8. ConfigurationSeeder — último: activa visible=true una vez todo está listo
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminUserSeeder::class,
            LocationSeeder::class,
            AboutSeeder::class,
            PortraitSeeder::class,
            LogoSeeder::class,
            TeamSeeder::class,
            PostSeeder::class,
            AsambleaSeeder::class,
            ConfigurationSeeder::class,
        ]);
    }
}
