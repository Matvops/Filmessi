<?php

namespace App\Repositories;

use App\Exceptions\AuthException;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository {


    public function getUserToAuthentication(string $email): User|null
    {
        return User::where('email', $email)
                            ->where('accept_term', true)
                            ->where('active', true)
                            ->whereNull('deleted_at')
                            ->first();
    }

    public function getUserByToken($token): User
    {
        try {

            return User::whereNull('email_verified_at')
                            ->where('token', $token)
                            ->firstOrFail();

        } catch (ModelNotFoundException) {
            throw new AuthException("Token inválido!");
        }
    }
}