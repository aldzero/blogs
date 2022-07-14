<?php

declare(strict_types=1);

namespace App\Domain\Post\UseCases\GetActivity;

use App\Domain\User\Queries\UserQueries;
use App\Models\PostLike;;

class Handler
{
    private UserQueries $queries;

    public function __construct(UserQueries $userQueries)
    {
        $this->queries = $userQueries;
    }

    public function handle(): array
    {
        $userId = auth()->user()->getAuthIdentifier();

        $user = $this->queries->getById($userId);

        $result = [];

        /** @var PostLike $like */
        foreach ($user->likes as $like) {
            $result['likedPosts'][] = $like->post()->get();
        }


        foreach ($user->comments as $comment) {
            $result['comments'][] = array_merge($comment->toArray(), $comment->post()->first()->toArray());
        }



        return $result;
    }
}
