<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Member;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function viewAny(Member $member)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function view(Member $member, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function create(Member $member)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function update(Member $member, Comment $comment)
    {
        return $member->id === $comment->id_owner;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function delete(Member $member, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function restore(Member $member, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function forceDelete(Member $member, Comment $comment)
    {
        //
    }
}
