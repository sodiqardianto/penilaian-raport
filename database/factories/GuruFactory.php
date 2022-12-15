<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'namaguru' => $this->faker->name,
            'notelp' => $this->faker->numerify('628##########'),
        ];
    }
}
