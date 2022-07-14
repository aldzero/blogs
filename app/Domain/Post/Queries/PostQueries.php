<?php

declare(strict_types=1);

namespace App\Domain\Post\Queries;

use App\Models\Post;

use App\Models\PostLike;
use DomainException;
use Illuminate\Pagination\LengthAwarePaginator;

class PostQueries
{
    private const PER_PAGE = 10;

    public function all(): LengthAwarePaginator
    {
        return Post::query()->select(['id', 'name', 'text'])->orderByDesc('created_at')->paginate(self::PER_PAGE);
    }

    public function getById(int $id): Post
    {
        $post = Post::find($id);

        if (!$post) {
            throw new DomainException('Поста с такий id не существует');
        }

        return $post;
    }

    public function saveLike(PostLike $like): void
    {
        $like->save();
    }

    public function getLikeByPostAndUserId(Post $post, int $userId): ?PostLike
    {
        return $post->likeByUserId($userId);
    }

    public function deleteLike(PostLike $like): void
    {
        $like->delete();
    }
}
