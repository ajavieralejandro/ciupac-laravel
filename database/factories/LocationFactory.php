<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * Coordenadas acotadas a la Patagonia argentina / costa atlántica:
     *   latitud:  -55 a -35 (sur de Buenos Aires hasta Tierra del Fuego)
     *   longitud: -75 a -55 (litoral atlántico patagónico)
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->city(),
            'latitude'  => $this->faker->randomFloat(4, -55, -35),
            'longitude' => $this->faker->randomFloat(4, -75, -55),
        ];
    }
}
