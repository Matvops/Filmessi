<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Crypt;

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

    protected function filmId(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Crypt::encrypt($value)
        );
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'favorite_film_id', 'favorite_user_id');
    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'category_id');
    }
}
