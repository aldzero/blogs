<?php

declare(strict_types=1);

namespace App\Domain\User\UseCases\Authorization;

class Command
{
    public string $login;

    public string $password;
}
