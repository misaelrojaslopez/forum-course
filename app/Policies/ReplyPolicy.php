<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reply;

class ReplyPolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user, Reply $reply)
    {
        return $user->id === $reply->user_id;
    }
}
