<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Domain\Post\UseCases\Unlike\Handler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UnlikePostController
{
    public function __invoke(Request $request, Handler $handler, int $postId): JsonResponse
    {
        $handler->handle($postId);

        return new JsonResponse(['message' => 'Лайк убран']);
    }
}
