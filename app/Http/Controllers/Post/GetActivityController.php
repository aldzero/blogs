<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Domain\Post\UseCases\GetActivity\Handler;
use Illuminate\Http\JsonResponse;

class GetActivityController
{
    public function __invoke(Handler $handler): JsonResponse
    {

        $result = $handler->handle();

        return new JsonResponse($result);
    }
}
