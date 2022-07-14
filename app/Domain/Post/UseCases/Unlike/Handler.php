<?php

declare(strict_types=1);

namespace App\Domain\Post\UseCases\Unlike;

use App\Domain\Post\Queries\PostQueries;
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
        $post = $this->queries->getById($postId);

        $userId = auth()->user()->getAuthIdentifier();

        $like = $this->queries->getLikeByPostAndUserId($post, $userId);

        if (!$like) {
            throw new DomainException('Лайк уже отсутствует!');
        }
        $this->queries->deleteLike($like);
    }
}
