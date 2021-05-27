<?php

namespace App\Policies;

use App\Models\Member;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user is the owner.
     *
     * @param  \App\Models\Member  $account
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function owner(Member $account, Member $member)
    {
        return $account->id === $member->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Member  $account
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function delete(Member $account, Member $member)
    {
        return $account->id === $member->id || $account->admin;
    }
}
