<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LogoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * Nota: Logo::$fillable=['name','image_name','image_path'] no incluye 'type'.
     * Para tests que usen esta factory, llamar Logo::unguard() o usar DB::table().
     * Tipos válidos en welcome4:
     *   'CP' → "Instituciones contrapartes"
     *   'F'  → "Financia"
     *   'A'  → "Instituciones que acompañan"
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'       => $this->faker->company(),
            'image_name' => 'placeholder.svg',
            'image_path' => 'images/seed',
            'type'       => $this->faker->randomElement(['CP', 'F', 'A']),
        ];
    }
}
