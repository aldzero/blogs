<?php

namespace App\Http\Resources;

use App\Models\Post;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;

class PostsListResource extends ResourceCollection
{
    private const LENGTH = 100;

    public function toArray($request)
    {
        /** @var Post $value */
        foreach ($this->collection as $value) {
            $value->text = substr($value->text, 0, self::LENGTH) . '...';

        }

        /** @var LengthAwarePaginator $paginator */
        $paginator = $this->resource;

        return [
            'currentPage' => $paginator->currentPage(),
            'perPage' => $paginator->perPage(),
            'total' => $paginator->total(),
            'data' => $this->collection
        ];
    }
}
