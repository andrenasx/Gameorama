<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{
    use HasFactory;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    // Table
    protected $table = 'news_post';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'date_time', 'aura', 'id_owner'
    ];

    /**
     * Get the member that owns the NewsPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'id_owner');
    }

    /**
     * The topics that belong to the NewsPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function topics(): BelongsToMany
    {
        return $this->belongsToMany(Topic::class, 'post_topic', 'id_post', 'id_topic');
    }

    /**
     * Get all of the images for the NewsPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(PostImage::class, 'id_post');
    }

    /**
     * Get all of the comments for the NewsPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'id_post');
    }

    /**
     * The auras that belong to the NewsPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function auras(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'post_aura', 'id_post', 'id_voter')->withPivot('upvote');
    }

    /**
     * The members that bookmarked the NewsPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bookmarkers(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'post_bookmark', 'id_post', 'id_bookmarker');
    }
}
