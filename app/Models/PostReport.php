<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostReport extends Model
{
    use HasFactory;

    protected $table = 'post_report';

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
    public function owner(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'id_reporter');
    }

    

}
