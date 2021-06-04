<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MemberReport extends Model
{
    use HasFactory;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

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

    public static function get_reported_members() {
        $num_reports_member = DB::table('member_report')
        ->select('id_reported', DB::raw('COUNT(*) AS num_reports'))
        ->groupBy('id_reported');

        $reported_comments = DB::table('member')->joinSub($num_reports_member, 'num_reports_member', function($join) {
                $join->on('member.id', '=', 'num_reports_member.id_reported');
            })->orderBy('num_reports', 'desc')->get();

        $members = [];

        foreach ($reported_comments as $rep_comment) {
            $member =  Member::find($rep_comment->id);
            array_push($members, $member);
        }
        return $members;
    }

}
