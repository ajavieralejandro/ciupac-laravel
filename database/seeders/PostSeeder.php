<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Seed the posts table with bootstrap data.
     *
     * Idempotente: usa el title como clave de unicidad.
     * Todos los posts tienen visible=true para que aparezcan en home.
     * PagesController: Post::orderBy('created_at','DESC')->paginate(5)->where('visible')
     */
    public function run()
    {
        $posts = [
            [
                'title'       => 'Inicio del Proyecto CIUPAC',
                'description' => 'El proyecto CIUPAC arrancó con gran participación ciudadana en Bahía Blanca.',
                'body'        => '<p>El proyecto <strong>CIUPAC</strong> (Ciencia Participativa de los Ambientes Costeros) inició actividades con una convocatoria abierta a la comunidad. Ciudadanos, estudiantes e investigadores se unieron para monitorear el estado de las playas y costas patagónicas.</p>',
                'visible'     => true,
                'image_name'  => 'placeholder.svg',
                'image_path'  => 'images/seed',
            ],
            [
                'title'       => 'Primera asamblea en Puerto Madryn',
                'description' => 'Se realizó la primera asamblea participativa en la costa de Puerto Madryn.',
                'body'        => '<p>La asamblea convocó a vecinos y organizaciones locales para presentar los resultados preliminares del monitoreo costero. Se registraron más de 50 participantes y se acordaron nuevos puntos de relevamiento.</p>',
                'visible'     => true,
                'image_name'  => 'placeholder.svg',
                'image_path'  => 'images/seed',
            ],
            [
                'title'       => 'Nuevo punto de monitoreo en Viedma',
                'description' => 'Viedma se incorporó como nueva localidad al programa de monitoreo participativo.',
                'body'        => '<p>La expansión del proyecto hacia Viedma amplía la cobertura geográfica del monitoreo costero. La comunidad local fue capacitada en el uso de la plataforma digital para el registro de datos ambientales.</p>',
                'visible'     => true,
                'image_name'  => 'placeholder.svg',
                'image_path'  => 'images/seed',
            ],
        ];

        foreach ($posts as $post) {
            DB::table('posts')->updateOrInsert(
                ['title' => $post['title']],
                array_merge($post, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
