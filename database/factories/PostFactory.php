<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'name' => fake()->name(),
            'text' => fake()->text(),
            'author' => User::inRandomOrder()->first()->id,
            'link' => fake()->url()
        ];
    }
}
