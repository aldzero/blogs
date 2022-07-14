<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Domain\Post\UseCases\Like\Handler;
use Illuminate\Http\JsonResponse;

class LikePostController
{
    public function __invoke(Handler $handler, int $postId): JsonResponse
    {
        $handler->handle($postId);

        return new JsonResponse(['message' => 'Лайк поставлен']);
    }
}
