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
        'name', 'search'
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

        /**
     * Get all of the comments for the NewsPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reports()
    {
        return $this->hasMany(TopicReport::class, 'id_topic');
    }

    public function dismiss_report()
    {
        DB::table('topic_report')->where('id_topic', '=', $this->id)
        ->delete();
    }

    public static function search_topics($query) 
    {
        return Topic::whereRaw('search @@ plainto_tsquery(\'english\', ?)', [$query])
        ->orderByRaw('ts_rank(search, plainto_tsquery(\'english\', ?)) DESC', [$query])
        ->get();
    }

    public static function topic_trending_posts($id_topic, $num_rows)
    {
        return DB::select(DB::raw("SELECT news_post.id as id
            FROM news_post
            INNER JOIN post_topic ON news_post.id = id_post AND ? = id_topic
            WHERE date_time >= (now() - interval '14 days')
            ORDER BY news_post.aura DESC
            OFFSET ? ROWS
            FETCH NEXT 15 ROWS ONLY"), [$id_topic, $num_rows]);
    }

    public static function popular_topics()
    {
        $num_followers_topics = DB::table('topic_follow')
            ->select('id_topic', DB::raw('COUNT(*) AS num_followers'))
            ->groupBy('id_topic');

        $popular_topics = DB::table('topic')->joinSub($num_followers_topics, 'num_followers_topics', function($join) {
                $join->on('topic.id', '=', 'num_followers_topics.id_topic');
            })->orderBy('num_followers', 'desc')->limit(5)->get();

        return $popular_topics;
    }
}
