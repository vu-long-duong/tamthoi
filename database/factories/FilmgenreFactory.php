<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmgenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'namegenre' => $this->faker->title(),
            'describe'=> $this->faker->text(),
            'status'=>rand(0,1),
        ];
    }
}
