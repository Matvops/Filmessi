<?php

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Film;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FilmRepository {

    public function getNewMovies(): Collection
    {
        return Film::where('active', true)
                        ->whereNull('deleted_at')
                        ->orderBy('year', 'DESC')
                        ->orderBy('created_at', 'DESC')
                        ->limit(8)
                        ->get();
        
    }

    public function getMostVisitMovies(): Collection
    {
        return Film::where('active', true)
                        ->whereNull('deleted_at')
                        ->orderBy('views', 'DESC')
                        ->limit(8)
                        ->get();
    }


    public function getFilmById($id): Film
    {
        try {
            return Film::where('film_id', $id)->firstOrFail();
        } catch (ModelNotFoundException) {
            throw new NotFoundException("Falha ao carregar filme");
        }
    }

}