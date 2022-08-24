<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmsaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'discountcode' => $this->faker->text(13),
            'price'=>rand(100000,180000),
            'exist'=>rand(3,6),
        ];
    }
}
