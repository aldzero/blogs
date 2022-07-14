<?php

declare(strict_types=1);

namespace App\Domain\User\Queries;

use App\Models\User;
use DomainException;

class UserQueries
{
    public function save(User $user): void
    {
        $user->save();
    }

    public function getById(int $id): ?User
    {
        $user = User::find($id);

        if (!$user) {
            throw new DomainException('Неверный логин');
        }

        return $user;
    }

    public function getByLogin(string $login): ?User
    {
        $user = User::whereLogin($login)->first();

        if (!$user) {
            throw new DomainException('Неверный логин');
        }

        return $user;
    }
}
