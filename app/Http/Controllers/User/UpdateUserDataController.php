<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Domain\User\UseCases\Update\Command;
use App\Domain\User\UseCases\Update\Handler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateUserDataController
{
    public function __invoke(Request $request, Handler $handler): JsonResponse
    {
        $command = new Command();

        $command->name = $request->get('name');
        $command->surname = $request->get('surname');
        $command->password = $request->get('password');

        $user = $handler->handle($command);

        return new JsonResponse(['data' => $user]);
    }
}
