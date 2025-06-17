<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    public $table = 'categories';
    public $primaryKey = 'category_id';
    public $timestamps = false;

    public function films(): BelongsTo
    {
        return $this->belongsTo(Film::class, 'film_category_id');
    }
}
