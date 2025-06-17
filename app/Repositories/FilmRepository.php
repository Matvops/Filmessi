<?php

namespace App\Repositories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Collection;

class FilmRepository {

    public function getNewMovies(): Collection|null
    {
        return Film::with('category')
                        ->where('active', true)
                        ->whereNull('deleted_at')
                        ->orderBy('year', 'DESC')
                        ->orderBy('created_at', 'DESC')
                        ->limit(8)
                        ->get();

        
    }
}