<?php

namespace App\Policies;

use App\Models\Member;
use App\Models\NewsPost;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user is the owner of the post.
     *
     * @param  \App\Models\Member  $account
     * @param  \App\Models\NewsPost  $newsPost
     * @return mixed
     */
    public function owner(Member $account, NewsPost $newsPost)
    {
        return $account->id === $newsPost->id_owner;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Member  $account
     * @param  \App\Models\NewsPost  $newsPost
     * @return mixed
     */
    public function delete(Member $account, NewsPost $newsPost)
    {
        return $account->id === $newsPost->id_owner || $account->admin;
    }
}
