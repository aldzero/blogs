<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'login' => fake()->firstName(),
            'password' => bcrypt('password'),
        ];
    }
}
