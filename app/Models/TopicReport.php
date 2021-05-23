<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicReport extends Model
{
    use HasFactory;

    protected $table = 'topic_report';

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
}
