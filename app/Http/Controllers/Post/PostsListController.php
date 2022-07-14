<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Domain\Post\UseCases\Get\Handler;
use App\Http\Resources\PostsListResource;
use Illuminate\Http\JsonResponse;

class PostsListController
{
    public function __invoke(Handler $handler): JsonResponse
    {
        $result = $handler->handle();

        return new JsonResponse(new PostsListResource($result));
    }
}
