<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CommentReport extends Model
{
    use HasFactory;

    protected $table = 'comment_report';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $fillable = [
        'id_reporter', 'id_comment', 'body'
    ];

    /**
     * Get the user that owns the CommentReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comment()
    {
        return $this->belongsTo(Comment::class, 'id_comment');
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

    public static function get_reported_comments()
    {
        $num_reports_comment = DB::table('comment_report')
        ->select('id_comment', DB::raw('COUNT(*) AS num_reports'))
        ->groupBy('id_comment');

        $reported_comments = DB::table('comment')->joinSub($num_reports_comment, 'num_reports_comment', function($join) {
                $join->on('comment.id', '=', 'num_reports_comment.id_comment');
            })->orderBy('num_reports', 'desc')->get();

        $comments = [];

        foreach ($reported_comments as $rep_comment) {
            $comment =  Comment::find($rep_comment->id);
            array_push($comments, $comment);
        }
        return $comments;
    }

}
