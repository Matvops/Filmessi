<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public $table = 'films';
    public $primaryKey = 'film_id';
    public $timestamps = true;
    public $incrementing = true;

    public $fillable = [
        'film_category_id',
        'title',
        'description',
        'year',
        'translated',
        'active',
        'views',
        'link',
        'image_path',
        'created_at',
        'deleted_at',
    ];
}
