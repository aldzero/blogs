<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Domain\Post\UseCases\GetDetail\Handler;
use Illuminate\Http\JsonResponse;

class GetPostDetailController
{
    public function __invoke(Handler $handler, int $id): JsonResponse
    {
        $result = $handler->handle($id);

        return new JsonResponse($result);
    }
}
