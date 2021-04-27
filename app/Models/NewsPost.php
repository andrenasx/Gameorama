<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public function owner()
    {
        return $this->belongsTo(Member::class, 'id_owner');
    }

    /**
     * The topics that belong to the NewsPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'post_topic', 'id_post', 'id_topic');
    }

    /**
     * Get all of the images for the NewsPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(PostImage::class, 'id_post');
    }

    /**
     * Get all of the comments for the NewsPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_post');
    }

    /**
     * Get all of the comments for the NewsPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parentComments()
    {
        $parentComments = [];
        $aux= DB::select(DB::raw("SELECT comment.id
        FROM comment
        WHERE id_post = ".$this->id." 
        AND id NOT IN (SELECT id_comment as id FROM reply WHERE id_post = ".$this->id.")
        ORDER BY date_time DESC"));
        foreach($aux as $auxIds ){
            array_push($parentComments,Comment::find($auxIds->id));
        }
        return $parentComments;
    }

    /**
     * The auras that belong to the NewsPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function auras()
    {
        return $this->belongsToMany(Member::class, 'post_aura', 'id_post', 'id_voter')->withPivot('upvote');
    }

    /**
     * The members that bookmarked the NewsPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bookmarkers()
    {
        return $this->belongsToMany(Member::class, 'post_bookmark', 'id_post', 'id_bookmarker');
    }
}
