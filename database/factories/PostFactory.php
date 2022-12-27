<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'content' => $this->faker->realText(rand(15,40)),
            'image' => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
