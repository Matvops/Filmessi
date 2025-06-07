<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as AuthUser;

class User extends AuthUser
{
    public $table = "users";
    public $primaryKey = "user_id";
    public $incrementing = true;
    
    public $fillable = [
        'username',
        'email',
        'password',
        'role',
        'accept_term',
        'email_verified_at',
        'active',
        'token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
