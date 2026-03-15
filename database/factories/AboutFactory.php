<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * Nota: About::$fillable=['image_name'] es muy restrictivo.
     * Para tests que usen esta factory, asegurarse de llamar
     * About::unguard() o usar DB::table() directamente.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body'       => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'image_name' => 'placeholder.svg',
            'image_path' => 'images/seed',
        ];
    }
}
