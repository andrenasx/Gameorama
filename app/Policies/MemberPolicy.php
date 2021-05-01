<?php

namespace App\Policies;

use App\Models\Member;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Member  $account
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function update(Member $account, Member $member)
    {
        return $account->id == $member->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function delete(Member $account, Member $member)
    {
        return $account->id == $member->id;
    }
}
