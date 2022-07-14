<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostCommentFactory extends Factory
{
    protected $model = PostComment::class;

    public function definition()
    {
        return [
            'comment' => fake()->text,
            'post' => Post::inRandomOrder()->first()->id,
            'author' => User::inRandomOrder()->first()->id,
        ];
    }
}
