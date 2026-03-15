<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PortraitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * Nota: Portrait no define $fillable (guarded='*' por defecto).
     * Para tests que usen esta factory, llamar Portrait::unguard()
     * o usar DB::table() directamente.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'      => $this->faker->sentence(4),
            'body'       => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'image_name' => 'placeholder.svg',
            'image_path' => 'images/seed',
        ];
    }
}
