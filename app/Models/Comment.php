<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\CommentNotification;
use App\Notifications\ReplyNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Comment extends Model
{
    use HasFactory;

    // Table
    protected $table = 'comment';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'date_time', 'aura', 'id_owner', 'id_post'
    ];

    /**
     * Get the member that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(Member::class, 'id_owner');
    }

    /**
     * Get the news post that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(NewsPost::class, 'id_post');
    }

    /**
     * The auras that belong to the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function auras()
    {
        return $this->belongsToMany(Member::class, 'comment_aura', 'id_comment', 'id_voter')->withPivot('upvote');
    }

    /**
     * Get all of the comments for the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->belongsToMany(Comment::class, 'reply', 'id_parent', 'id_comment')->orderBy('date_time', 'desc');
    }

    public function get_time() {
        $time = Carbon::createFromFormat('Y-m-d H:i:s', $this->date_time);
        return $time->diffForHumans();
    }

        /**
     * Get all of the comments for the NewsPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reports()
    {
        return $this->hasMany(CommentReport::class, 'id_comment');
    }

    public function dismiss_report()
    {
        DB::table('comment_report')->where('id_comment', '=', $this->id)->delete();
    }


    public function add_vote($vote) {
        DB::table('comment_aura')->insert([
            'id_comment' => $this->id,
            'id_voter' => Auth::user()->id,
            'upvote' => $vote
        ]);
    }

    public function delete_vote() {
        DB::table('comment_aura')
        ->where('id_voter', '=', Auth::user()->id)
        ->where('id_comment', '=', $this->id)
        ->delete();
    }

    public function reply_transaction($body, $idParent, $id_post) {
        DB::beginTransaction();
        $comment = null;
        try {
            $comment = Comment::create([
                'body' => $body,
                'date_time' => now(),
                'aura' => 0,
                'id_owner' => Auth::user()->id,
                'id_post' => $id_post
            ]);

        } catch (ValidationException $e) {
            return back()->withError($e->getErrors());
        } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }

        try {
            DB::table('reply')->insert([
                'id_comment' => $comment->id,
                'id_parent' => $idParent
            ]);

        } catch (ValidationException $e) {
            return back()->withError($e->getErrors());
        } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }
        $parent_comment = Comment::find($idParent);
        $parent_comment->owner->notify(new ReplyNotification($comment));
        DB::commit();

        return $comment;
    }

}
