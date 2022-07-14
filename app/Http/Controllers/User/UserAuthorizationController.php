<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Domain\User\UseCases\Authorization\Command;
use App\Domain\User\UseCases\Authorization\Handler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserAuthorizationController
{
    public function __invoke(Request $request, Handler $handler): JsonResponse
    {
        $command = new Command();

        $command->login = $request->get('login');
        $command->password = $request->get('password');

        $token = $handler->handle($command);

        return new JsonResponse(['accessToken' => $token]);
    }
}
