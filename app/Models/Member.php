<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use HasFactory;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    // Table
    protected $table = 'member';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'full_name', 'email', 'password', 'bio', 'avatar_image', 'banner_image', 'aura'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get all of the news posts for the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(NewsPost::class, 'id_owner');
    }

    /**
     * The post's auras that belong to the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts_auras()
    {
        return $this->belongsToMany(NewsPost::class, 'post_aura', 'id_voter', 'id_post')->withPivot('upvote');
    }

    /**
     * Get all of the comments for the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_owner');
    }

    /**
     * The comment's auras that belong to the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function comments_auras()
    {
        return $this->belongsToMany(Comment::class, 'comment_aura', 'id_voter', 'id_comment')->withPivot('upvote');
    }

    /**
     * The news posts that the Member bookmarked
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bookmarks()
    {
        return $this->belongsToMany(NewsPost::class, 'post_bookmark', 'id_bookmarker', 'id_post');
    }

    /**
     * The topics that the Member follows
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'topic_follow', 'id_member', 'id_topic')->orderBy('name');
    }

    /**
     * The members that follow the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(Member::class, 'member_follow', 'id_followed', 'id_follower')->orderBy('username');
    }

    /**
     * The members that the Member follows
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function following()
    {
        return $this->belongsToMany(Member::class, 'member_follow', 'id_follower', 'id_followed')->orderBy('username');
    }

    public function isMe(int $id)
    {
        return $id === $this->id;
    }
}
