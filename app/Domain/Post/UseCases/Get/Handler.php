<?php

declare(strict_types=1);

namespace App\Domain\Post\UseCases\Get;

use App\Domain\Post\Queries\PostQueries;
use Illuminate\Pagination\LengthAwarePaginator;

class Handler
{
    private PostQueries $queries;

    public function __construct(PostQueries $queries)
    {
        $this->queries = $queries;
    }

    public function handle(): LengthAwarePaginator
    {
        return $this->queries->all();
    }
}
