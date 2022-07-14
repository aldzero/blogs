<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * App\Models\PostComment
 *
 * @property int $id
 * @property string $comment
 * @property int $post
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $author
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\PostCommentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PostComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostComment whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostComment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostComment wherePost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostComment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PostComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'comment',
        'post'
    ];

    protected $hidden = [
        'author',
        'post',
        'created_at',
        'updated_at'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    public function getPostLink(): Collection
    {
        return $this->belongsTo(Post::class)->get('link');
    }
}
