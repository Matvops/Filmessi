<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public $table = "favorites";
    public $primaryKey = "favorite_id";
    public $timestamps = false;
}
