<?php

declare(strict_types=1);

namespace App\Domain\User\UseCases\Registration;

class Command
{
    public string $name;

    public string $surname;

    public string $login;

    public string $password;
}
