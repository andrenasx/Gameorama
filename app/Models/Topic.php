<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    // Table
    protected $table = 'topic';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The members that follow the Topic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'topic_follow', 'id_topic', 'id_member');
    }

    /**
     * The news posts that have the Topic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(NewsPost::class, 'post_topic', 'id_topic', 'id_post');
    }
}
