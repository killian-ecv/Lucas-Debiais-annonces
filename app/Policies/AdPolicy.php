<?php

namespace App\Policies;

use App\Models\Ad;
use App\Models\User;

class AdPolicy
{
    public function update(User $user, Ad $ad)
    {
        // Autoriser la modification si l'utilisateur est le propriétaire de l'article ou s'il est un super administrateur
        return $user->id === $ad->user_id || $user->is_super_admin;
    }
}
