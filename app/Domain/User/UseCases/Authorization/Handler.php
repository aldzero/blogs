<?php

declare(strict_types=1);

namespace App\Domain\User\UseCases\Authorization;

use App\Domain\User\Queries\UserQueries;
use App\Models\User;
use DomainException;

class Handler
{
    private UserQueries $queries;

    public function __construct(UserQueries $queries)
    {
        $this->queries = $queries;
    }

    public function handle(Command $command)
    {
        $user = $this->queries->getByLogin($command->login);

        if (!password_verify($command->password, $user->password)) {
            throw new DomainException('Неверный пароль');
        }

        return auth()->login($user);
    }
}
