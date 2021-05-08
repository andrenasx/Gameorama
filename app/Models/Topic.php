<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public function followers()
    {
        return $this->belongsToMany(Member::class, 'topic_follow', 'id_topic', 'id_member');
    }

    /**
     * The news posts that have the Topic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(NewsPost::class, 'post_topic', 'id_topic', 'id_post');
    }

    public function isFollowed($id_member) {
        return DB::table('topic_follow')->select('id_topic')
        ->where('id_topic','=',$this->id)
        ->where('id_member','=',$id_member)
        ->first();
    }
}
