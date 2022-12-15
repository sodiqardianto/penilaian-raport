<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MuridFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'namamurid' => $this->faker->name,
            'notelp' => $this->faker->numerify('628##########'),
            'jenisKelamin' => $this->faker->randomElement(['1', '0']),
        ];
    }
}
