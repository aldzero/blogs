<?php

namespace App\Domain\User\UseCases\Update;

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
        $userId = auth()->user()->getAuthIdentifier();

        $user = $this->queries->getById($userId);

        $user->name = $command->name;
        $user->surname = $command->surname;
        $user->password = bcrypt($command->password);

        $this->queries->save($user);

        return $user;
    }
}
