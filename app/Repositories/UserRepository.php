<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository {


    public function getUserToAuthentication(string $email): User|null
    {
        return User::where('email', $email)
                            ->where('accept_term', true)
                            ->where('active', true)
                            ->whereNull('deleted_at')
                            ->first();
    }
}