<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        'title', 'body', 'date_time', 'aura', 'id_owner', 'search'
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
    public function reports()
    {
        return $this->hasMany(PostReport::class, 'id_post');
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

    public function get_time() {
        $time = Carbon::createFromFormat('Y-m-d H:i:s', $this->date_time);
        return $time->diffForHumans();
    }

    public function isBookmarked($id_member){
        return DB::table('post_bookmark')->select('id_bookmarker')
        ->where('id_bookmarker','=',$id_member)
        ->where('id_post','=',$this->id)
        ->first();
    }

    public static function feed($num_rows)
    {
        return DB::select(DB::raw("SELECT news_post.id as id
        FROM news_post
        INNER JOIN member ON id_owner = member.id
        WHERE news_post.id IN
        (
            SELECT DISTINCT news_post.id FROM news_post
            INNER JOIN post_topic ON news_post.id = post_topic.id_post
            INNER JOIN topic ON post_topic.id_topic = topic.id
            INNER JOIN member_follow ON member_follow.id_follower = ?
            WHERE topic.name IN
            (
                SELECT name FROM topic
                INNER JOIN topic_follow ON topic.id = topic_follow.id_topic
                WHERE topic_follow.id_member = ?
            )
            OR
            member_follow.id_followed = id_owner
        ) ORDER BY date_time DESC
        OFFSET ? ROWS
        FETCH NEXT 15 ROWS ONLY"), [Auth::user()->id, Auth::user()->id, $num_rows]);

    }

    public static function trending_posts($num_rows)
    {
        return DB::select(DB::raw("SELECT id
            FROM news_post
            WHERE date_time >= (now() - interval '14 days')
            ORDER BY news_post.aura DESC
            OFFSET ? ROWS
            FETCH NEXT 15 ROWS ONLY"), [$num_rows]);

    }


    public function dismiss_post_report() 
    {
        DB::table('post_report')->where('id_post', '=', $this->id)
            ->delete();
    }

    public static function search_posts($query)
    {
        return NewsPost::whereRaw('search @@ plainto_tsquery(\'english\', ?)', [$query])
        ->orderByRaw('ts_rank(search, plainto_tsquery(\'english\', ?)) DESC', [$query])
        ->orderBy('date_time', 'desc')
        ->get();
    }

}
