<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class Comment extends Model
{
    use HasFactory;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    // Table
    protected $table = 'comment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'date_time', 'aura', 'id_owner', 'id_post'
    ];

    /**
     * Get the member that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(Member::class, 'id_owner');
    }

    /**
     * Get the news post that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(NewsPost::class, 'id_post');
    }

    /**
     * The auras that belong to the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function auras()
    {
        return $this->belongsToMany(Member::class, 'comment_aura', 'id_comment', 'id_voter')->withPivot('upvote');
    }

    /**
     * Get all of the comments for the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->belongsToMany(Comment::class, 'reply', 'id_parent', 'id_comment')->orderBy('date_time', 'desc');
    }

    public function get_time() {
        $time = Carbon::createFromFormat('Y-m-d H:i:s', $this->date_time);
        return $time->diffForHumans();
    }
}
