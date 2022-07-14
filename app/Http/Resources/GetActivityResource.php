<?php

namespace App\Http\Resources;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GetActivityResource extends ResourceCollection
{
    public function toArray($request)
    {
        $result = [];

        /** @var User $user */
        foreach ($this->collection as $user) {

            $postArr['post'] = $user->posts;

            $postArr['comments'] = $user->comments;

            $result[] = $postArr;
        }


        return $result;
    }
}
