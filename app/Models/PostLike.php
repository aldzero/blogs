<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\PostLike
 *
 * @property int $id
 * @property int $user
 * @property int $post
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PostLike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostLike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostLike query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostLike whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostLike whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostLike wherePost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostLike whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostLike whereUser($value)
 * @mixin \Eloquent
 */
class PostLike extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post', 'id');
    }
}
