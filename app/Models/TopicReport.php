<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TopicReport extends Model
{
    use HasFactory;

    protected $table = 'topic_report';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $fillable = [
        'body', 'date_time'
    ];

    /**
     * Get the user that owns the CommentReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class, 'id_comment');
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

    public static function get_reported_topics() {
        $num_reports_topic = DB::table('topic_report')
        ->select('id_topic', DB::raw('COUNT(*) AS num_reports'))
        ->groupBy('id_topic');

        $reported_topics = DB::table('topic')->joinSub($num_reports_topic, 'num_reports_topic', function($join) {
                $join->on('topic.id', '=', 'num_reports_topic.id_topic');
            })->orderBy('num_reports', 'desc')->get();

        $topics = [];

        foreach ($reported_topics as $rep_topic) {
            $topic =  Topic::find($rep_topic->id);
            array_push($topics, $topic);
        }
        return $topics;
    }
}
