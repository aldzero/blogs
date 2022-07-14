<?php

declare(strict_types=1);

namespace App\Domain\Post\UseCases\GetDetail;

use App\Domain\Post\Queries\PostQueries;

class Handler
{
    private PostQueries $queries;

    public function __construct(PostQueries $queries)
    {
        $this->queries = $queries;
    }

    public function handle(int $id): array
    {
        $post = $this->queries->getById($id);

        $postArr = $post->toArray();

        $postArr['comments'] = $post->comments;
        $postArr['author'] = $post->user;


        return $postArr;
    }
}
