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
            'id'    => uniqid(),
            'title' => $this->faker->text(50),
            'desc'  => $this->faker->realTextBetween(),
            'user_id' => 1
        ];
    }
}
