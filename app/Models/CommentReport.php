<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReport extends Model
{
    use HasFactory;

    protected $table = 'comment_report';

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


}
