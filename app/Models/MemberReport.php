<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberReport extends Model
{
    use HasFactory;

    protected $table = 'member_report';

    protected $fillable = [
        'body', 'date_time'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'id_reported');
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
