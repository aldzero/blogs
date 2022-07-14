<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property string $link
 * @property Post|null $user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PostComment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PostLike[] $likes
 * @property-read int|null $likes_count
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'text',
        'author',
        'link',
    ];

    protected $hidden = [
        'author',
        'created_at',
        'updated_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(PostLike::class, 'post', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(PostComment::class, 'post', 'id')->with('user');
    }

    public function author()
    {
        return $this->user()
            ->select('name')
            ->addSelect('surname')
            ->first();
    }

    public function likeByUserId(int $userId): ?PostLike
    {
        return $this->likes()->where('user', $userId)->first();
    }
}
