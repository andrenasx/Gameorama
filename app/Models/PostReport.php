<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\NewsPost;

class PostReport extends Model
{
    use HasFactory;

    protected $table = 'post_report';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $fillable = [
        'body', 'date_time'
    ];


    public function post()
    {
        return $this->belongsTo(NewsPost::class, 'id_post');
    }

    /**
     * Get the user that owns the PostReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(Member::class, 'id_reporter');
    }

    public static function get_reported_posts()
    {
        $num_reports_post = DB::table('post_report')
        ->select('id_post', DB::raw('COUNT(*) AS num_reports'))
        ->groupBy('id_post');

        $reported_posts = DB::table('news_post')->joinSub($num_reports_post, 'num_reports_post', function($join) {
                $join->on('news_post.id', '=', 'num_reports_post.id_post');
            })->orderBy('num_reports', 'desc')->get();

        $posts = [];

        foreach ($reported_posts as $rep_post) {
            $post = NewsPost::find($rep_post->id);
            array_push($posts, $post);
        }
        return $posts;
    }

}
