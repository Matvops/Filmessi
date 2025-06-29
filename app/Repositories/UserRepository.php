<?php

namespace App\Repositories;

use App\Exceptions\AuthException;
use App\Exceptions\NotFoundException;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository {


    public function getUserToAuthentication(string $email): User|null
    {
        return User::where('email', $email)
                            ->where('active', true)
                            ->whereNotNull('email_verified_at')
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

    public function getUserByEmail(string $email): User
    {
        try {
            return User::where('email', $email)->firstOrFail();
        } catch (ModelNotFoundException) {
            throw new NotFoundException("Email inválido!");
        }
    }

    public function getFavorites(int $id): Collection
    {
        return User::find($id)->films;
    }
}