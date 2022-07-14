<?php

declare(strict_types=1);

namespace App\Domain\User\UseCases\Registration;

use App\Domain\User\Queries\UserQueries;
use App\Models\User;

class Handler
{
    private UserQueries $queries;

    public function __construct(UserQueries $queries)
    {
        $this->queries = $queries;
    }

    public function handle(Command $command): User
    {
        $user = new User();

        $user->name = $command->name;
        $user->surname = $command->surname;
        $user->login = $command->login;
        $user->password = bcrypt($command->password);

        $this->queries->save($user);

        return $user;
    }
}
