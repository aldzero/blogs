<?php

declare(strict_types=1);

namespace App\Domain\Post\UseCases\Like;

use App\Domain\Post\Queries\PostQueries;
use App\Models\PostLike;
use DomainException;

class Handler
{
    private PostQueries $queries;

    public function __construct(PostQueries $queries)
    {
        $this->queries = $queries;
    }

    public function handle(int $postId): void
    {
        $userId = auth()->user()->getAuthIdentifier();

        $post = $this->queries->getById($postId);

        if ($userId === $post->user->id) {
            throw new DomainException('Нельзя ставить лайк на свой пост');
        }

        $like = $this->queries->getLikeByPostAndUserId($post, $userId);

        if ($like) {
            throw new DomainException('Лайк уже поставлен!');
        }

        $like = new PostLike();

        $like->user = $userId;
        $like->post = $postId;

        $this->queries->saveLike($like);
    }
}
