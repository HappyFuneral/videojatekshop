<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewindex(User $user): bool
    {
        if ($user->role_id === 1) {
            return true;
        }
        return false;
    }
}
