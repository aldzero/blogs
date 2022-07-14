<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Domain\User\UseCases\Registration\Command;
use App\Domain\User\UseCases\Registration\Handler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserRegistrationController
{
    public function __invoke(Request $request, Handler $handler): JsonResponse
    {
        $command = new Command();

        $command->name = $request->get('name');
        $command->surname = $request->get('surname');
        $command->login = $request->get('login');
        $command->password = $request->get('password');

        $handler->handle($command);

        return new JsonResponse(['success' => true, 'message' => 'Вы успешно зарегистрировались!']);
    }
}
