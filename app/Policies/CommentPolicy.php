<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Member;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user is the owner of the comment.
     *
     * @param  \App\Models\Member  $account
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function owner(Member $account, Comment $comment)
    {
        return $account->id === $comment->id_owner;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Member  $account
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function delete(Member $account, Comment $comment)
    {
        return $account->id === $comment->id_owner || $account->admin;
    }
}
