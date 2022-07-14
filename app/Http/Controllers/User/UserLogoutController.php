<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use Illuminate\Http\JsonResponse;

class UserLogoutController
{
    public function __invoke(): JsonResponse
    {
        auth()->logout();

        return new JsonResponse(['message' => 'Вы успешно вышли из системы!']);
    }
}
